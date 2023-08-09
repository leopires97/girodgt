//dayGridWeek  para ver semana	
document.addEventListener('DOMContentLoaded', function () {
    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {	  
      plugins: [ 'interaction', 'dayGrid', 'timeGrid', 'list', 'rrule' ], 
      header: {
        left: 'prev,next today',
        center: 'title',
        right: 'dayGridMonth,timeGridWeek,timeGridDay,listMonth'
      },minTime: "07:00:00",
        maxTime: "21:30:00",		
		defaultView: 'timeGridWeek', 
		weekends: false,
        locale: 'pt-br',       
        //defaultDate: '2019-04-12', 
        editable: true,
        eventLimit: true,
        events: 'list_eventos_fisio.php',
        extraParams: function () {
            return {
                cachebuster: new Date().valueOf()
            };
        },
        eventClick: function (info) {
			
            $("#apagar_evento").attr("href", "proc_apagar_evento.php?id=" + info.event.id);
            info.jsEvent.preventDefault(); // don't let the browser navigate
            console.log(info.event);
			
			
			
$(function(){
	

				                                    
                                    
				$.get('inc/ajax_evento_fisio.php',{cod_cat: info.event.id, ajax: 'true'}, function(f){
					var options = '';
					options = f;
					$('#cap2').html(options).show();
				});


	});		
			
 $('#visualizar').modal('show');			
			/*		
			
			tipo2='aaaa';
			
            $('#visualizar #id').text(info.event.id);
            $('#visualizar #id').val(info.event.id);
            $('#visualizar #tipo').text(info.event.paciente_id);
            $('#visualizar #tipo').val(info.event.tipo);			
            $('#visualizar #title').text(info.event.title);
            $('#visualizar #title').val(info.event.title);
            $('#visualizar #start').text(info.event.start.toLocaleString());
            $('#visualizar #start').val(info.event.start.toLocaleString());
            $('#visualizar #end').text(info.event.end.toLocaleString());
            $('#visualizar #end').val(info.event.end.toLocaleString());
            $('#visualizar #color').val(info.event.backgroundColor);
            $('#visualizar').modal('show');*/
        },
			eventDrop: function(info) { // si changement de position

			//var Event = [info.event.id, info.event.start.format('YYYY-MM-DD HH:mm:ss'), info.event.end.format('YYYY-MM-DD HH:mm:ss')];

	         edit(info.event);


			},
			eventResize: function(info) { // si changement de longueur

				edit(info.event);

			}, 		
        selectable: true,
        select: function (info) {
            //alert('Início do evento: ' + info.start.toLocaleString());
            $('#cadastrar #start').val(info.start.toLocaleString());
            $('#cadastrar #end').val(info.end.toLocaleString());
            $('#cadastrar').modal('show');
        }
    });

    calendar.render();
});
	
	
//grava oarrastando
function edit(event){
	
inicio=event.start.toLocaleDateString();
inicioh=event.start.toLocaleTimeString();	

				
			if(event.end){
				final = event.end.toLocaleDateString();
				finalh = event.end.toLocaleTimeString();
			}else{
				final = inicio;
				finalh = inicioh;
			}    
							
		
				
				
	 Event[0]=event.id;
	 Event[1]=inicio;
	 Event[2]=inicioh;
	 Event[3]=final;
	 Event[4]=finalh;
	
	 //url2='editEventDate.php?id='+Event[0]+'&de='+Event[1]+'&ate='+Event[3]+'&deh='+Event[2]+'&ateh='+Event[4];
		 
	
			
			$.ajax({
				
			 url: url2,
			 type: "POST",
			 data: {Event:Event},           
             processData: false
			});
	
		
		}	


//Mascara para o campo data e hora
function DataHora(evento, objeto) {
    var keypress = (window.event) ? event.keyCode : evento.which;
    campo = eval(objeto);
    if (campo.value == '00/00/0000 00:00:00') {
        campo.value = "";
    }

    caracteres = '0123456789';
    separacao1 = '/';
    separacao2 = ' ';
    separacao3 = ':';
    conjunto1 = 2;
    conjunto2 = 5;
    conjunto3 = 10;
    conjunto4 = 13;
    conjunto5 = 16;
    if ((caracteres.search(String.fromCharCode(keypress)) != -1) && campo.value.length < (19)) {
        if (campo.value.length == conjunto1)
            campo.value = campo.value + separacao1;
        else if (campo.value.length == conjunto2)
            campo.value = campo.value + separacao1;
        else if (campo.value.length == conjunto3)
            campo.value = campo.value + separacao2;
        else if (campo.value.length == conjunto4)
            campo.value = campo.value + separacao3;
        else if (campo.value.length == conjunto5)
            campo.value = campo.value + separacao3;
    } else {
        event.returnValue = false;
    }
}

$(document).ready(function () {
    $("#addevent").on("submit", function (event) {
        event.preventDefault();
       $.ajax({
            method: "POST",
            url: "cad_event.php",
            data: new FormData(this),
            contentType: false,
            processData: false,
            success: function (retorna) {
                if (retorna['sit']) {
                    //$("#msg-cad").html(retorna['msg']);
                    location.reload();
                } else {
                    $("#msg-cad").html(retorna['msg']);
                }
            }
        })
    });
    

    
    $('.btn-canc-edit').on("click", function(){
        $('#visualizar').modal('hide');	

    });
    
    $("#editevent").on("submit", function (event) { 
        event.preventDefault();
       $.ajax({
            method: "POST",
            url: "edit_event_fisio.php",
            data: new FormData(this),
            contentType: false,
            processData: false,
            success: function (retorna) {
                if (retorna['sit']) {
                    //$("#msg-cad").html(retorna['msg']);
                    location.reload();
                } else {
                    $("#msg-edit").html(retorna['msg']);
                }
            }
        })
    });
	
	

});	
	