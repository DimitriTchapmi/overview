      jQuery.ajaxSetup({cache: true});
      jQuery.getScript('http://chat.eventizi.itinet.fr/server/get.php?l=fr&t=js&g=mini.xml', function() {
        // Configure application & connect user
        // Notice: exclude "user" and "password" if using anonymous login
        JappixMini.launch({
          connection: {
            domain: 'anonymous.eventizi.itinet.fr',
            resource: 'eventizi chat'
          },

          application: {
            network: {
              autoconnect: false
            },

            interface: {
              showpane: true,
              animate: true
            },

            user: {
              random_nickname: true
            },

            chat: {
              open: ['admin@eventizi.itinet.fr']
            },
    
            }
          });
      });