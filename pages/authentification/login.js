// TODO: FORM validation
$(function () {
    $('#login').validate({
        rules: {
          password: {
              required: true,
              remote: {
                url: 'authentification.php?aff=passwordCheack',
                type: 'post',
                data: {
                  password: function() {
                    return $('input[name="password"]').val();
                  }
                }
              }
  
          },
        email: {
            required: true,
            email: true,
            remote: {
              url: 'authentification.php?aff=emailCheack',
              type: 'post',
              data: {
                email: function() {
                  return $('input[name="email"]').val();
                }
              }
            }
        },

        },
      messages: {
        password: {
          remote: `Le mot de passe que vous avez entrer est faux.`,
          required: "Entrer votre mot de passe",
        },
        email: {
          required: "Entrer email",
          email: "Entrer email avec cette format : exemple@exemple.com",
          remote: `L'email que vous avez entrer n'exist pas.`
        },
      },
      submitHandler: function (form, event){
        event.preventDefault()
        let data = {
          email : $('#email').val().trim(),
          password : $('#password').val().trim()
        }
        axios.post('authentification.php?aff=login', data)
        .then((res)=>{
          if(res.data == 1){
            window.location.href = '../Acceuil/acceuil.php'
          }
        })

        return false;
      },
      errorElement: 'span',
      errorPlacement: function (error, element) {
        error.addClass('invalid-feedback');
        element.closest('.mb-3').append(error);
      },
      highlight: function (element, errorClass, validClass) {
        $(element).addClass('is-invalid');
      },
      unhighlight: function (element, errorClass, validClass) {
        $(element).removeClass('is-invalid');
      }
    });
  });
