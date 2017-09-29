	

		$('#dataUpdate').on('show.bs.modal', function (event) {
		  var button = $(event.relatedTarget) // Botón que activó el modal
		  var id = button.data('id')
		  var idproy = button.data('proy') // Extraer la información de atributos de datos
		  var categoria = button.data('categoria') // Extraer la información de atributos de datos
		  var idcat = button.data('idcat')
		  var titulo = button.data('titulo') // Extraer la información de atributos de datos
		  var responsable = button.data('responsable')
		  var idresp = button.data('idresp') // Extraer la información de atributos de datos
		 var descripcion = button.data('descripcion')

		     


		  var modal = $(this)
		  modal.find('.modal-title').text('Modificar : '+titulo)
		  modal.find('.modal-body #categoria1').val(idcat)
		  modal.find('.modal-body #categoriass').val(categoria)
		  modal.find('.modal-body #id').val(id)
		  modal.find('input[name="idproy"]').val('hola')
		  modal.find('.modal-body #titulo').val(titulo)
		  modal.find('.modal-body #descripcion').val(descripcion)
		  modal.find('.modal-body #responsable1').val(idresp)
		   modal.find('.modal-body #responsable').val(responsable)
		  
		  $('.alert').hide();//Oculto alert


		})
		
		

		$('#dataDelete').on('show.bs.modal', function (event) {
		  var button = $(event.relatedTarget) // Botón que activó el modal
		  var id = button.data('id')
		   // Extraer la información de atributos de datos
		  var modal = $(this)
		  modal.find('#ideta').val(id)
		   
		})

		$('#actDelete').on('show.bs.modal', function (event) {
		  var button = $(event.relatedTarget) // Botón que activó el modal
		  var id = button.data('id') // Extraer la información de atributos de datos
		 
		  var modal = $(this)
		  modal.find('modal-content #idact').val(id)
		 
		})
	
		
		 
