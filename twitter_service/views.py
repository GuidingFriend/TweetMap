from django.shortcuts import render

# Create your views here.
from django.http import HttpResponse
import json

def get_recent_tweets(request):
    lResume = []
    oauth = get_oauth()
    r = requests.get(url="https://api.twitter.com/1.1/statuses/user_timeline.json?screen_name=UserNickname&count=8", auth=oauth)
    lTweets = r.json()
    for dTweet in lTweets:
    lResume.append(dTweet['text'])
    return HttpResponse(json.dumps(lResume),mimetype="application/json")