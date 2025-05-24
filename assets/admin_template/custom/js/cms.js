var app = {
    alert: function(title,content,smile_emo){
        setTimeout(function () {
                        Swal.fire({
                        allowOutsideClick: false,
                          title: title,
                          text: content,
                          icon: smile_emo,
                          confirmButtonText: 'OK',
                        })
                    }, 100);
    },

    alert_redirection: function(title,content,redirect,smile_emo){
        setTimeout(function () {
                        Swal.fire({
                        allowOutsideClick: false,
                          title: title,
                          text: content,
                          icon: smile_emo,
                          confirmButtonText: 'OK',
                        }).then(function() {
                            window.location = redirect;
                        })
                    }, 100);
    },
  }