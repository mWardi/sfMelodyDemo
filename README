# sfMelodyDemo #


sfMelodyDemo is a demo application for use of [sfMelodyPlugin](https://github.com/chok/sfMelodyPlugin).
sfMelodyDemo includes for now :

 * Signup with facebook
 * Signup with twitter
 * Customizable User Account creation


## Configuration ##

    For more configuration, check the [sfMelodyPlugin README](https://github.com/chok/sfMelodyPlugin) section.

User Extra Data :

    User:
      inheritance:
        extends: sfGuardUser
        type: simple
      columns:
        fb_name:
          type: string(255)
          notnull: false
        fb_id:
          type: integer
          notnull: false
        gender:
          type: string(6)
          notnull: false
        birthday:
          type: date
          notnull: false
        locations:
          type: string(255)
          notnull: false
        twitter_id:
          type: integer
          notnull: false
        twitter_oauth_token:
          type : string(200)
          notnull: false
        twitter_oauth_token_secret:
          type : string(200)
          notnull: false

options in app.yml  :

    all:
      melody:
        redirect_register: '@melody_signup'

        facebook:
          key: "your fb api key here"
          secret: "your fb api secret"
          callback: http://sfmelodydemo.dev/frontend_dev.php/
          scope: [email,user_birthday]

          user:
            fb_id:
              call: me
              path: id
              key: true
            username:
              call: me
              path: username
            first_name:
              call: me
              path: first_name
            last_name:
              call: me
              path: last_name
            email_address:
              call: me
              path: email
              key: true
            fb_name:
              call: me
              path: name
            birthday:
              call: me
              path: birthday
            locations:
              call: me
              path: location/name

        twitter:
          key: "twitter consumer key"
          secret: "twitter consumer secret"
          callback: http://sfmelodydemo.dev/frontend_dev.php/
          user:
            username:
              call: me
              path: screen_name
            twitter_id:
              call: me
              path: id
              key: true