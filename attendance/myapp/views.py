from django.shortcuts import render
from django.http import HttpResponse
from django.shortcuts import render

def signup(request):
  return render(request, 'signup.html', {'number': 100})

def index(request):
	return render (request, 'index.html')
# Create your views here.
