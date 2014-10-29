from django.shortcuts import render
from django.http import HttpResponse, HttpResponseRedirect
from django.http import Http404
from django.views.decorators.csrf import csrf_protect
from django.conf import settings

from django.contrib.staticfiles.storage import staticfiles_storage

def home(request):
        return render(request,"tweet-map.html", locals())

def tweet_sync(request):
    return render(request,"tweet-sync.html", locals())