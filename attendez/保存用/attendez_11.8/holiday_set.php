<?php require 'header.php'; ?>
<div class="container-calendar">
  <h4 id="monthAndYear"></h4>
  <div class="button-container-calendar">
      <button id="previous" onclick="previous()">‹</button>
      <button id="next" onclick="next()">›</button>
  </div>
  
  <table class="table-calendar" id="calendar" data-lang="ja">
      <thead id="thead-month"></thead>
      <tbody id="calendar-body"></tbody>
  </table>
  
  <div class="footer-container-calendar">
      <label for="month">日付指定：</label>
      <select id="month" onchange="jump()">
          <option value=0>1月</option>
          <option value=1>2月</option>
          <option value=2>3月</option>
          <option value=3>4月</option>
          <option value=4>5月</option>
          <option value=5>6月</option>
          <option value=6>7月</option>
          <option value=7>8月</option>
          <option value=8>9月</option>
          <option value=9>10月</option>
          <option value=10>11月</option>
          <option value=11>12月</option>
      </select>
      <select id="year" onchange="jump()"></select>
        <script>
          function generate_year_range(start, end) {
              var years = "";
              for (var year = start; year <= end; year++) {
                  years += "<option value='" + year + "'>" + year + "</option>";
              }
              return years;
            }
            
            var today = new Date();
            var currentMonth = today.getMonth();
            var currentYear = today.getFullYear();
            var selectYear = document.getElementById("year");
            var selectMonth = document.getElementById("month");
            
            var createYear = generate_year_range(2022, 2025);
            
            document.getElementById("year").innerHTML = createYear;
            
            var calendar = document.getElementById("calendar");
            var lang = calendar.getAttribute('data-lang');
            
            var months = ["1月", "2月", "3月", "4月", "5月", "6月", "7月", "8月", "9月", "10月", "11月", "12月"];
            var days = ["日", "月", "火", "水", "木", "金", "土"];
            
            var dayHeader = "<tr>";
            for (day in days) {
              dayHeader += "<th data-days='" + days[day] + "'>" + days[day] + "</th>";
            }
            dayHeader += "</tr>";
            
            document.getElementById("thead-month").innerHTML = dayHeader;
            
            monthAndYear = document.getElementById("monthAndYear");
            showCalendar(currentMonth, currentYear);
            
            function next() {
              currentYear = (currentMonth === 11) ? currentYear + 1 : currentYear;
              currentMonth = (currentMonth + 1) % 12;
              showCalendar(currentMonth, currentYear);
            }
            
            function previous() {
              currentYear = (currentMonth === 0) ? currentYear - 1 : currentYear;
              currentMonth = (currentMonth === 0) ? 11 : currentMonth - 1;
              showCalendar(currentMonth, currentYear);
            }
            
            function jump() {
              currentYear = parseInt(selectYear.value);
              currentMonth = parseInt(selectMonth.value);
              showCalendar(currentMonth, currentYear);
            }
            
            function showCalendar(month, year) {
            
              var firstDay = ( new Date( year, month ) ).getDay();
            
              tbl = document.getElementById("calendar-body");
            
              tbl.innerHTML = "";
            
              monthAndYear.innerHTML = months[month] + " " + year;
              selectYear.value = year;
              selectMonth.value = month;
            
              // creating all cells
              var date = 1;
              for ( var i = 0; i < 6; i++ ) {
                  var row = document.createElement("tr");
            
                  for ( var j = 0; j < 7; j++ ) {
                      if ( i === 0 && j < firstDay ) {
                          cell = document.createElement( "td" );
                          cellText = document.createTextNode("");
                          cell.appendChild(cellText);
                          row.appendChild(cell);
                      } else if (date > daysInMonth(month, year)) {
                          break;
                      } else {
                          cell = document.createElement("td");
                          cell.setAttribute("data-date", date);
                          cell.setAttribute("data-month", month + 1);
                          cell.setAttribute("data-year", year);
                          cell.setAttribute("data-month_name", months[month]);
                          cell.className = "date-picker";
                          cell.innerHTML = "<span>" + date + "</span>";
            
                          if ( date === today.getDate() && year === today.getFullYear() && month === today.getMonth() ) {
                              cell.className = "date-picker selected";
                          }
                          row.appendChild(cell);
                          date++;
                      }
                  }
            
                  tbl.appendChild(row);
              }
            
            }
            
            function daysInMonth(iMonth, iYear) {
              return 32 - new Date(iYear, iMonth, 32).getDate();
            }
            </script>
    </div>
</div>

<script src="js/calendar.js" type="text/javascript"></script>
<style>
    .wrapper {
            margin: 15px auto;
            max-width: 700px;
            text-align: center;
        }
        .container-calendar {
            background: #ffffff;
            padding: 30px;
            width: 75%;
            margin: 0 auto;
            overflow: auto;
            text-align: center;
        }
  .button-container-calendar button {
      cursor: pointer;
      display: inline-block;
      zoom: 1;
      background: #00a2b7;
      color: #fff;
      border: 1px solid #0aa2b5;
      border-radius: 4px;
      padding: 5px 10px;
  }
  .table-calendar {
      border-collapse: collapse;
      width: 100%;
  }
  .table-calendar th, .table-calendar td{
      padding: 10px;
      border: 1px solid #e2e2e2;
      text-align: center;
      vertical-align: top;
  }
  .date-picker.selected {
      font-weight: bold;
      color: #fff;
      background: #cc0000;
  }
  .date-picker.selected span {
      border-bottom: 2px solid currentColor;
  }
  /* 日曜 */
  .date-picker:nth-child(1) {
      color: red;
  }
  /* 土曜 */
  .date-picker:nth-child(7) {
      color: blue;
  }
  #monthAndYear {
      text-align: center;
      margin-top: 0;
  }
  .button-container-calendar {
      position: relative;
      margin-bottom: 1em;
      overflow: hidden;
      clear: both;
  }
  #previous {
      float: left;
  }
  #next {
      float: right;
  }
  .footer-container-calendar {
      margin-top: 1em;
      border-top: 1px solid #dadada;
      padding: 10px 0;
  }
  .footer-container-calendar select {
      cursor: pointer;
      display: inline-block;
      zoom: 1;
      background: #ffffff;
      color: #454545;
      border: 1px solid #bfc5c5;
      border-radius: 3px;
      padding: 5px 1em;
  }
  </style>
  <?php require 'footer.php';?>