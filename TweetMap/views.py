from __future__ import absolute_import
from django.shortcuts import render, render_to_response
from django.http import HttpResponse, HttpResponseRedirect
from django.http import Http404
from django.views.decorators.csrf import csrf_protect
from django.conf import settings
from twitter_service.models import TwitterServiceTwitterfeed2
import MySQLdb
from django.template import RequestContext


from django.contrib.staticfiles.storage import staticfiles_storage

def home(request):
    tweets = TwitterServiceTwitterfeed2.objects.all().filter(x__isnull = False,y__isnull = False)
    context = {'tweets' : tweets}
    return render_to_response("tweet-map.html", {'tweets' : tweets}, RequestContext(request))

def tweet_sync(request):
    return render(request,"tweet-sync.html", locals())