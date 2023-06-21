//TODO: form validation script
$(document).ready(function (){
  $.validator.addMethod("passwordRegex", function(value, element) {
    return this.optional(element) || /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&\-_=])[A-Za-z\d@$!%*?&\-_=]{8,}$/.test(value);
}, "Le mot de passe doit contenir au moins une lettre majuscule, une lettre minuscule, un chiffre et un caractère spécial.");
$.validator.addMethod("passwordMatching", function(value, element) {
  return value == $('#password1').val()
}, "Le nouveau mot de passe ne correspond pas. Retapez le mot de passe ici.");
$('#register').on('#cin', function() {
  $(this).trigger('change');})
$(function () {
    $('#register').validate({
      rules: {
        email: {
          required: true,
          email: true,
          remote: {
            url: 'authentification.php?aff=cheackEmail',
            type: 'post',
            data: {
              email: function() {
                return $('input[name="email"]').val();
              }
            }
          }
        },
        cin: {
          required: true,
          minlength: 8,
          maxlength:10,
          remote: {
            url: 'authentification.php?aff=cheackCin',
            type: 'post',
            data: {
              cin: function() {
                console.log('first')
                return $('input[name="cin"]').val();
              }
            }
          }
        },
        Adresse: {
          required: true,
        },
        nom: {
          required: true
        },
        Prenom: {
          required: true
        },
        tel: {
          required: true
        },
        ville: {
          required: true
        },
        password1: {
          required: true,
          passwordRegex: true
        },
        password2: {
          required: true,
          passwordMatching:true
        },
  
      },
      messages: {
        email: {
          required: "Entrer email",
          email: "Entrer email avec cette format : exemple@exemple.com",
          remote: `L'email que vous avez entrez est deja utilise`

        },
        cin: {
          required: "Entrer votre CIN",
          minlength: "CIN doit depasser 8 charachters",
          maxlength: "CIN ne doit pas depasser 10 charachters",
          remote: `Le CIN que vous avez entrez est deja utilise`

        },
        nom: {
          required: "Entrer votre nom"
        },
        Prenom: {
          required: "Entrer votre prenom"
        },
        Adresse: {
          required: "Entrer votre adresse"
        },
        tel: {
          required: "Entrer votre telephone"
        },
        ville: {
          required: "Entrer votre ville"
        },
        password1: {
          required: "Entrer votre mot de passe"
        },
        password2: {
          required: "Entrer votre mot de passe"
        },
      },
      submitHandler: function (form, event){
        event.preventDefault()
        let data = {
          cin : $('#cin').val().trim(),
          nom : $('#nom').val().trim(),
          Prenom : $('#Prenom').val().trim(),
          Adresse : $('#Adresse').val().trim(),
          ville : $('#ville').val().trim(),
          tel : $('#tel').val().trim(),
          email : $('#email').val().trim(),
          password : $('#password1').val().trim()
        }
        axios.post('authentification.php?aff=register', data)
        .then((res)=>{
          if(res.data == 1){
            window.location.href = 'login.php'
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
})

  $('.pass1').click(()=>{
    if( $('#password1').attr('type') == 'password'){
    $('#password1').attr('type', 'text')
    }else{
    $('#password1').attr('type', 'password')
    }
  })
  $('.pass2').click(()=>{
    if( $('#password2').attr('type') == 'password'){
      $('#password2').attr('type', 'text')
      }else{
      $('#password2').attr('type', 'password')
      }
  })

  