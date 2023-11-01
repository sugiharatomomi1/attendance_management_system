from django.urls import path
from . import views

urlpatterns = [
    path('nfc_test/', views.nfc_test, name='nfc_test'),
]
