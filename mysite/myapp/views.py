from django.shortcuts import render
from django.http import HttpResponse

# Create your views here.

def index(request):
	html = "<h1>myappのウェルカムページです</h1>"
	return HttpResponse(html)

def foo(request):
	html = "<h1>fooが指定された時のページです</h1>"
	return HttpResponse(html)
