$(document).ready(function(){
	
	$("#files").change(function() {
    	$("#imagemQuestao").html('<img src="'+window.URL.createObjectURL(this.files[0])+'" id="imagemVisualiza"  >');
 		$("#imagemBd").removeAttr('src');
 		 $("#imagemvazia").removeAttr('value');
    });

	//valida formulário de cadastro de questao
	$("#AltQuestionAddForm").validate(
	    {
	        errorElement: "span",
	        errorClass: "text-danger",
	        rules: {
	        	"data[AltQuestion][question_text]":{
	                required : true
	            },      
	            "data[AltQuestion][answerA]":{
	                required : true
	            }, 
	            "data[AltQuestion][answerB]":{
	                required : true
	            }, 
	            "data[AltQuestion][answerC]":{
	                required : true
	            }, 
	            "data[AltQuestion][answerD]":{
	                required : true
	            },                   
	            "data[AltQuestion][answerE]":{
	                required : true
	            }, 
	        },
	        messages: {
	        	"data[AltQuestion][question_text]":{
	                required : "Insira o enunciado!"
	            },  
	           	"data[AltQuestion][answerA]":{
	                required : "Insira a resposta correspondente à alternativa A!"
	            },
	           	"data[AltQuestion][answerB]":{
	                required : "Insira a resposta correspondente à alternativa B!"
	            },
	           	"data[AltQuestion][answerC]":{
	                required : "Insira a resposta correspondente à alternativa C!"
	            },
	           	"data[AltQuestion][answerD]":{
	                required : "Insira a resposta correspondente à alternativa D!"
	            },
	           	"data[AltQuestion][answerE]":{
	                required : "Insira a resposta correspondente à alternativa E!"
	            },
	        }
	    }
	  );

	    //valida formulário de cadastro de curso
	$("#CourseAddForm").validate(
	    {
	        errorElement: "span",
	        errorClass: "text-danger",
	        rules: { 
	        	"data[Course][name]":{
	                required : true
	            }    
	        },
	        messages: {
	        	"data[Course][name]":{
	                required : "Insira o curso!"
	            }
	        }
	    }
	);




	//valida formulário de cadastro de questao
	$("#TextQuestionAddForm").validate(
	    {
	        errorElement: "span",
	        errorClass: "text-danger",
	        rules: { 
	        	"data[TextQuestion][question_text]":{
	                required : true
	            },      
	            "data[TextQuestion][answer_text]":{
	                required : true
	            },
	        },
	        messages: {
	        	"data[TextQuestion][question_text]":{
	                required : "Insira o enunciado!"
	            },  
	           	"data[TextQuestion][answer_text]":{
	                required : "Insira a resposta!"
	            },
	        }
	    }
	);



});


function check(){

	if (category_id.selectedIndex==2) {
		document.getElementById('course_id').disabled = false;
		$(".input_course").show();
	}
	else {
		document.getElementById('course_id').disabled = true;
	    $(".input_course").hide();
	}
};

function validaimg(){

		$("#files").val(null);
		//$("#files").removeAttr('value');
		$("#imagemVisualiza").attr("src", $("#files").val());
		$("#imagemVisualiza").removeAttr("src");

}

function SetaNullImagemVazia(){
        $("#imagemvazia").val("vazio");

		$("#files").val(null);	
		//$("#files").removeAttr('value');
		
		$("#imagemVisualiza").attr("src", $("#files").val());
		$("#imagemVisualiza").removeAttr("src"); 

		$("#imagemBd").attr("src", $("#files").val());		
}


