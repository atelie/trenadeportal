$(document).ready(function() {
    //load tooltips
    $('*[data-toggle=tooltip]').tooltip();

    $("#imagemPerfil").change(function() {
        $("#imagemUsuarioPerfil").attr("src", window.URL.createObjectURL(this.files[0]));
    });

    //$("#imagemPerfil").change(function() {
        //alert( window.URL.revokeObjectURL( window.URL.createObjectURL(this.files[0]) ) );
        //$("#imagemUsuarioPerfil").attr("src", $( this ).val());
    //});

    //valida formulário de cadastro e upload de usuarios
    $("#form-user").validate(
        {
            errorElement: "span",
            errorClass: "text-danger",
            rules: {
                nome:{
                    required : true
                },
                sobrenome:{
                    required : true
                },
                cpf:{
                    required : true
                },
                username:{
                    required : true
                },
                email:{
                    required : true,
                    email: true
                },
                password:{
                    required : true
                },
                confirmPassword:{
                    required : true,
                    equalTo: "#password"
                },
                pais:{
                    required : true
                },
                estado:{
                    required : true
                },
                cidade:{
                    required : true
                },
                bairro:{
                    required : true
                },
                rua:{
                    required : true
                },
                numero:{
                    required : true,
                    number: true
                },
                complemento:{
                    required : true
                },
                telefone:{
                    required : true
                }                
            },
            messages: {
                nome: {
                    required: "Este campo deve ser preenchido!"
                },
                sobrenome: {
                    required: "Este campo deve ser preenchido!"
                },
                cpf:{
                    required : "Este campo deve ser preenchido!"
                },
                username:{
                    required : "Este campo deve ser preenchido!"
                },
                email:{
                    required : "Este campo deve ser preenchido!",
                    email: "Digite um e-mail válido!"
                },
                password:{
                    required : "Este campo deve ser preenchido!"
                },
                confirmPassword:{
                    required : "Este campo deve ser preenchido!",
                    equalTo: "Confirmação de senha incorreta!"
                },
                pais:{
                    required : "Este campo deve ser preenchido!"
                },
                estado:{
                    required : "Este campo deve ser preenchido!"
                },
                cidade:{
                    required : "Este campo deve ser preenchido!"
                },
                bairro:{
                    required : "Este campo deve ser preenchido!"
                },
                rua:{
                    required : "Este campo deve ser preenchido!"
                },
                numero:{
                    required : "Este campo deve ser preenchido!",
                    number: "O valor do campo deve ser numérico!"
                },
                complemento:{
                    required : "Este campo deve ser preenchido!"
                },
                telefone:{
                    required : "Informe seu telefone!"
                }   
            }
        }
    );
});


