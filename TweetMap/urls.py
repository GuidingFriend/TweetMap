from django.conf.urls import patterns, include, url

from django.contrib import admin
admin.autodiscover()

urlpatterns = patterns('',
    # Examples:
    # url(r'^$', 'TweetMap.views.home', name='home'),
    # url(r'^blog/', include('blog.urls')),
    url(r'^$', home),
    url(r'^tweet-sync/', tweet_sync),
    url(r'^admin/', include(admin.site.urls)),
)
