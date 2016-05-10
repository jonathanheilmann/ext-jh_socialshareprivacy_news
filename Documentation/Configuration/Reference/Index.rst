

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


Reference
^^^^^^^^^


TypoScript options – Main settings
""""""""""""""""""""""""""""""""""


.. ### BEGIN~OF~TABLE ###

.. container:: table-row

   Property
         Property:

   Data type
         Data type:

   Description
         Description:

   Default
         Default:


.. container:: table-row

   Property
         socialshareprivacy\_path

   Data type
         string

   Description
         Path to the socialprivacyshare javascript file.Leave empty if the
         extension 'socialshareprovacy' is used.

   Default
         EXT:jh\_socialshareprivacy\_news/Resources/Public/socialshareprivacy/j
         query.socialshareprivacy.js


.. container:: table-row

   Property
         use\_jquery\_from\_extension

   Data type
         int

   Description
         Set to '1' if jh\_socialshareprivacy\_news should include jQuery.
         (jQuery is required for a working socialshareprivacy-bar)

   Default
         0


.. container:: table-row

   Property
         jquery\_path

   Data type
         string

   Description
         Path to jQuery

   Default
         EXT:jh\_socialshareprivacy\_news/Resources/Public/jquery-1.9.1.min.js


.. container:: table-row

   Property
         js\_to\_head

   Data type
         int

   Description
         Set to '1' if you use an extension to minify and/or compress your
         javascript (moves the javascript for the socialshareprivacy-bar
         settings to html-head)

   Default
         0


.. container:: table-row

   Property
         info\_link

   Data type
         string

   Description
         Link of the -i button.

         Set to 'off' or leave empty if button should be hidden.

         Not set by default.

   Default
         \


.. container:: table-row

   Property
         cookie\_path

   Data type
         string

   Description
         Path of the cookie.

         Not set by default.

   Default
         \


.. container:: table-row

   Property
         cookie\_expires

   Data type
         integer

   Description
         Sets the livetime of the cookie if permalogin is set to on.

         Not set by default.

   Default
         \


.. container:: table-row

   Property
         cookie\_domain

   Data type
         string

   Description
         Domain of the cookie.

         Do not touch this if you don't have to. The system evaluates the
         domain by itself.

   Default
         \


.. container:: table-row

   Property
         css\_path

   Data type
         string

   Description
         Path to the css file to style the socialprivacyshare bar.

         If empty no css file will be included.

   Default
         EXT:jh\_socialshareprivacy\_news/Resources/Public/socialshareprivacy/s
         ocialshareprivacy/socialshareprivacy.css


.. ###### END~OF~TABLE ######


[tsref:plugin.tx\_news.tx\_jhsocialshareprivacynews ]


Example
"""""""

::

     plugin.tx_news.tx_jhsocialshareprivacyttnews {
             socialshareprivacy_path = EXT:jh_socialshareprivacy_news/Resources/Public/socialshareprivacy/jquery.socialshareprivacy.js

                   use_jquery_from_extension = 0
                   jquery_path = EXT:jh_socialshareprivacy_news/Resources/Public/jquery-1.9.1.min.js

                   # Standardeinstellungen des Skripts
                   # Nur eintragen, wenn die default des Skripts geändert werden sollen.
                   info_link =
                   cookie_expires =
                   css_path = EXT:jh_socialshareprivacy_news/Resources/Public/socialshareprivacy/socialshareprivacy/socialshareprivacy.css
           }


TypoScript options – facebook settings
""""""""""""""""""""""""""""""""""""""

.. ### BEGIN~OF~TABLE ###

.. container:: table-row

   Property
         Property:

   Data type
         Data type:

   Description
         Description:

   Default
         Default:


.. container:: table-row

   Property
         status

   Data type
         string

   Description
         On: activate facebook in socialprivacyshare bar

         Off: deactivate facebook in socialprivacyshare bar

   Default
         on


.. container:: table-row

   Property
         dummy\_img

   Data type
         string

   Description
         URL to the fake-picture(Since version 0.2.1: leave empty to use
         default image from sprite)

   Default
         \


.. container:: table-row

   Property
         perma\_option

   Data type
         string

   Description
         On: activate option to permanently sent data to facebook

         Off: deactivate option to permanently sent data to facebook

   Default
         on


.. container:: table-row

   Property
         display\_name

   Data type
         string

   Description


   Default
         Facebook


.. container:: table-row

   Property
         referrer\_track

   Data type
         string

   Description
         Is added to the end of the URL for tracking, optional

   Default
         \


.. container:: table-row

   Property
         action

   Data type
         string

   Description
         Recommend: 'empfehlen'

         Like: 'gefällt mir'

   Default
         recommend


.. container:: table-row

   Property
         language

   Data type
         string

   Description


   Default
         de\_DE


.. ###### END~OF~TABLE ######

[tsref:plugin.tx\_news.tx\_jhsocialshareprivacynews.services.facebook]


Example
"""""""

::

         plugin.tx_news.tx_jhsocialshareprivacynews.services.facebook {
                  status=on
              dummy_img =
            perma_option=on
                display_name=Facebook
                  referrer_track=
                action=recommend
               language=de_DE
         }


TypoScript options – twitter settings
"""""""""""""""""""""""""""""""""""""

.. ### BEGIN~OF~TABLE ###

.. container:: table-row

   Property
         Property:

   Data type
         Data type:

   Description
         Description:

   Default
         Default:


.. container:: table-row

   Property
         status

   Data type
         string

   Description
         On: activate twitter in socialprivacyshare bar

         Off: deactivate twitter in socialprivacyshare bar

   Default
         on


.. container:: table-row

   Property
         dummy\_img

   Data type
         string

   Description
         URL to the fake-picture(Since version 0.2.1: leave empty to use
         default image from sprite)

   Default
         \


.. container:: table-row

   Property
         perma\_option

   Data type
         string

   Description
         On: activate option to permanently sent data to twitter

         Off: deactivate option to permanently sent data to twitter

   Default
         on


.. container:: table-row

   Property
         display\_name

   Data type
         string

   Description


   Default
         Twitter


.. container:: table-row

   Property
         referrer\_track

   Data type
         string

   Description
         Is added to the end of the URL for tracking, optional

   Default
         \


.. container:: table-row

   Property
         language

   Data type
         string

   Description


   Default
         de\_DE


.. ###### END~OF~TABLE ######

[tsref:plugin.tx\_news.tx\_jhsocialshareprivacynews.services.twitter]


Example
"""""""

::

           plugin.tx_news.tx_jhsocialshareprivacynews.services.facebook {
                 status=on
              dummy_img =
                   perma_option=on
                display_name=Twitter
   referrer_track=
    language=de_DE
        }


TypoScript options – Google+ settings
"""""""""""""""""""""""""""""""""""""

.. ### BEGIN~OF~TABLE ###

.. container:: table-row

   Property
         Property:

   Data type
         Data type:

   Description
         Description:

   Default
         Default:


.. container:: table-row

   Property
         status

   Data type
         string

   Description
         On: activate google+ in socialprivacyshare bar

         Off: deactivate google+ in socialprivacyshare bar

   Default
         on


.. container:: table-row

   Property
         dummy\_img

   Data type
         string

   Description
         URL to the fake-picture(Since version 0.2.1: leave empty to use
         default image from sprite)

   Default
         \


.. container:: table-row

   Property
         perma\_option

   Data type
         string

   Description
         On: activate option to permanently sent data to google+

         Off: deactivate option to permanently sent data to google+

   Default
         on


.. container:: table-row

   Property
         display\_name

   Data type
         string

   Description


   Default
         Google+


.. container:: table-row

   Property
         referrer\_track

   Data type
         string

   Description
         Is added to the end of the URL for tracking, optional

   Default
         \


.. container:: table-row

   Property
         language

   Data type
         string

   Description


   Default
         de\_DE


.. ###### END~OF~TABLE ######

[tsref:plugin.tx\_news.tx\_jhsocialshareprivacynews.services.gplus]


Example
"""""""

::

           plugin.tx_news.tx_jhsocialshareprivacynews.services.gplus {
            status=on
              dummy_img =
            perma_option=on
                display_name=Google+
   referrer_track=
   language=de_DE
        }

