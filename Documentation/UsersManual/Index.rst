

.. ==================================================
.. FOR YOUR INFORMATION
.. --------------------------------------------------
.. -*- coding: utf-8 -*- with BOM.

.. ==================================================
.. DEFINE SOME TEXTROLES
.. --------------------------------------------------
.. role::   underline
.. role::   typoscript(code)
.. role::   ts(typoscript)
   :class:  typoscript
.. role::   php(code)


Users manual
------------

- Install the extension

- Edit your news template:

  - Add {namespace jh=Tx\_JhSocialshareprivacyNews\_ViewHelpers} after {namespace n=Tx\_News\_ViewHelpers}

  - Add <jh:SocialSharePrivacy></jh:SocialSharePrivacy> where you want to
    see the socialshareprivacy-bar

    - If you want to provide a static uri, your line may look like
      this: <jh:SocialSharePrivacy href="www.your-static-
      link.com"></jh:SocialSharePrivacy>

    - If you want to use the socialshareprivacy-bar in a list view you will
      need to add a uid-tag like this: <jh:SocialSharePrivacy
      uid="{newsItem.uid}"></jh:SocialSharePrivacy>

    - If you use more than one news-view on a single page you will need to
      add a prefix to the uid-tag like this for the list-
      view: <jh:SocialSharePrivacy
      uid="list-{newsItem.uid}"></jh:SocialSharePrivacy> and this one for the
      details view: <jh:SocialSharePrivacy
      uid="details-{newsItem.uid}"></jh:SocialSharePrivacy> this prevents the
      socialshareprivacy-bar from destroing the output.

- All settings are done via typoscript setup.


