// TODO: datatable script
let userDataTable;
$(document).ready(function(){
  // TODO: remplir update form
$('.table').on('click', '.update', function (){
  let id = $(this).data('id');
  $('#id_note').val(id);
  axios.get(`notesData.php?aff=remplir&id=${id}`)
  .then(res=>{
    $('#titre1').val(res.data.titre);
    $('#desc1').val(res.data.description)
    $('#debutT1').val(res.data.debutT)
    $('#finT1').val(res.data.finT)

  })
})
// Update
  // DataTable
   userDataTable = $('.table').DataTable({
      'processing': true,
    //   "responsive": true,
      'serverSide': true,

      'serverMethod': 'post',
      'ajax': {
          'url':`notesData.php?aff=datatable`
      },
      'columns': [
        { data: 'titre' },
        { data: 'debutT' },
          { data: 'finT' },
          { data: 'Libelle' ,
            render: function(data){
                if(data === 'En cours'){
                  return `<span class="badge bg-red">${data}</span>`
                }else{
                  return `<span class="badge bg-green">${data}</span>`
                }
            }
            },
          { data: 'action' },
      ],

  })

});
  // Delete
  $('.table').on('click','.deleteBTN',function(){
    let id = $(this).data('id');
      Swal.fire({
        title: 'Voulez-vous supprimer?',
        showCancelButton: true,
        confirmButtonText: 'Supprimer',
        denyButtonText: `Ne pas supprimer`,
      }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) {
          axios.get(`notesData.php?aff=delete&id=${id}`)
          .then(res=>{
          // Recharger DataTable
          userDataTable.ajax.reload();
            Swal.fire("Votre enregistrement est supprimer avec success.")

          })
          .catch(err=>{
            Swal.fire('Error de suppression')
          })
        }
      })
  })
// TODO: FORM validation
$(function () {
  $('#ajout').validate({
      rules: {
        titre: {
            required: true,
        },
        debutT: {
          required: true,
        },
        finT: {
          required: true,
          remote: {
            url: 'notesData.php?aff=dateCheack',
            type: 'post',
            data: {
              dateT: function() {
                return $('input[name="debutT"]').val()
              },
              dateF: function (){
                return $('input[name="finT"]').val()
              }
            }
          }
        },

      },
    messages: {
      titre: {
        required: "Tu dois entrer le titre de votre tache",
      },
      debutT: {
        required: "Tu dois entrer la date et l'heure de debut de votre tache",

      },
      finT: {
        required: "Tu dois entrer la date et l'heure de fin de votre tache",
        remote: "La date et l'heure de début doivent être inférieures à la date et l'heure de fin."
      },
    },
    submitHandler: function (form, event){
      event.preventDefault()
      let data = {
        titre : $('#titre').val().trim(),
        desc : $('#desc').val().trim(),
        debutT : $('#debutT').val().trim(),
        finT : $('#finT').val().trim(),
      }
      axios.post('notesData.php?aff=ajout', data)
      .then((res)=>{
        if(res.data.statut == 1){
          userDataTable.ajax.reload();
          $('.btn-close').click();
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
  $('#update').validate({
    rules: {
      titre1: {
          required: true,
      },
      debutT1: {
        required: true,
      },
      finT1: {
        required: true,
      },

    },
  messages: {
    titre1: {
      required: "Tu dois entrer le titre de votre tache",
    },
    debutT1: {
      required: "Tu dois entrer la date et l'heure de debut de votre tache",

    },
    finT1: {
      required: "Tu dois entrer la date et l'heure de fin de votre tache",

    },
  },
  submitHandler: function (form, event){
    event.preventDefault()
    let id = $('#id_note').val()
    let data = {
      id,
      titre : $('#titre1').val().trim(),
      desc : $('#desc1').val().trim(),
      debutT : $('#debutT1').val().trim(),
      finT : $('#finT1').val().trim(),
    }
    axios.post('notesData.php?aff=update', data)
    .then((res)=>{
      if(res.data.statut == 1){
        userDataTable.ajax.reload();
        $('.btn-close').click();
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
