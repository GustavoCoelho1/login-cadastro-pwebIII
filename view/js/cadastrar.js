$(document).ready(() => {
    let frmUser = $("#frm_User")[0];
    let frmCliente = $("#frm_Cliente")[0];
    let cadMsg = $("#cadMsg");

    let frmUserCampos = $("#frm_User input");
    let frmClienteCampos = $("#frm_Cliente input");

    let btnProximo = $("#btn_proximo")[0];
    let btnVoltar = $("#btn_voltar")[0];
    let btnCadastrar = $("#btn_submit")[0];

    btnProximo.addEventListener('click', () => {
        btnProximo.innerHTML = `
            <div class="spinner-border text-light" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>`

        setTimeout(() => {
            let camposComplete = [];

            frmUserCampos.each(function(idx, campo) {
                camposComplete[idx] = (campo.value != "") ? true : false;
            });
        
            let todosPreenchido = camposComplete.every((campo) => campo == true);
            
            if (todosPreenchido != false)
            {
                sumirUserFrm();

                setTimeout(() => {
                    frmUser.style.display = "none";
                    aparecerCliFrm();

                    btnVoltar.style.opacity = "1";
                    btnVoltar.style.zIndex = "1";
                }, 800);
            }
            else
            {
                sumirUserFrm();
                frmUser.style.display = "none";

                aparecerMsg();

                cadMsg.children("ion-icon").attr("name", "close-outline");
                cadMsg.children("span").html("Preencha todos os campos!");

                setTimeout(() => {
                    frmUserCampos.each(function(idx, campo) {
                        campo.value = "";
                    });

                    sumirMsg();

                    setTimeout(() => {
                        cadMsg.children("ion-icon").attr("name", "");
                        cadMsg.children("span").html("");

                        frmUser.style.display = "flex";

                        aparecerUserFrm();
                    }, 800);
                }, 3500);

                btnProximo.innerHTML = "Próximo";
            }
        }, 10000);
    });

    btnVoltar.addEventListener('click', () => {
        sumirCliFrm();

        setTimeout(() => {
            aparecerUserFrm();
            frmUser.style.display = "flex";
        }, 800);

        btnVoltar.style.opacity = "0";
        btnVoltar.style.zIndex = "-1";

        btnProximo.innerHTML = "Próximo";
    });

    btnCadastrar.addEventListener('click', () => {
        btnCadastrar.innerHTML = `
            <div class="spinner-border text-light" style="display: inline-block; width: 2rem" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>`

        let camposComplete = [];

        frmClienteCampos.each(function(idx, campo) {
            camposComplete[idx] = (campo.value != "") ? true : false;
        });

        let todosPreenchido = camposComplete.every((campo) => campo == true);
        
        if (todosPreenchido != false)
        {
            setTimeout(() => {
                let formData = new FormData();

                let allCampos = $(".lg_frmLyt input");

                allCampos.each(function(idx, campo) {
                    formData.append(campo.name, campo.value)
                });

                $.ajax({
                    url: '../controller/cadastrar.php',
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false
                })
                .done((resultado) => {
                    console.log(resultado);

                    let resposta = JSON.parse(resultado);

                    if(resposta['sucesso'] != false)
                    {
                        sumirCliFrm();

                        btnVoltar.style.opacity = "0";
                        btnVoltar.style.zIndex = "-1";

                        setTimeout(() => {
                            cadMsg.children("ion-icon").attr("name", "checkmark-outline");
                            cadMsg.children("span").html("Cadastrado com sucesso!");

                            aparecerMsg();

                            setTimeout(() => {
                                window.location.replace("../view/login.php");
                            }, 2000);
                        }, 800);
                    }
                    else
                    {
                        sumirCliFrm();

                        setTimeout(() => {
                            cadMsg.children("ion-icon").attr("name", "close-outline");
                            cadMsg.children("span").html("Houve um problema ao cadastrar\nTente novamente!");

                            aparecerMsg();

                            setTimeout(() => {
                                window.location.replace("../view/cadastrar.php");
                            }, 5000);
                        }, 800);
                    }
                });
            }, 1000);
        }
        else
        {
            setTimeout(() => {
                sumirCliFrm();
                frmCliente.style.display = "none";

                btnVoltar.style.opacity = "0";
                btnVoltar.style.zIndex = "-1";

                aparecerMsg();

                cadMsg.children("ion-icon").attr("name", "close-outline");
                cadMsg.children("span").html("Preencha todos os campos!");

                setTimeout(() => {
                    frmClienteCampos.each(function(idx, campo) {
                        campo.value = "";
                    });

                    sumirMsg();

                    setTimeout(() => {
                        cadMsg.children("ion-icon").attr("name", "");
                        cadMsg.children("span").html("");

                        aparecerCliFrm();
                        frmCliente.style.display = "flex";

                        btnVoltar.style.opacity = "1";
                        btnVoltar.style.zIndex = "1";

                        btnCadastrar.innerHTML = "Cadastrar";
                    }, 800);
                }, 3500);
            }, 800);
        }
    });

    function aparecerUserFrm()
    {
        frmUser.style.height = "100%";
        frmUser.style.opacity = "1";
        frmUser.style.zIndex = "1";
    }

    function sumirUserFrm() 
    {
        frmUser.style.height = "0";
        frmUser.style.opacity = "0";
        frmUser.style.zIndex = "-1";
    }

    function aparecerCliFrm() 
    {
        frmCliente.style.height = "100%";
        frmCliente.style.opacity = "1";
        frmCliente.style.zIndex = "1";
    }

    function sumirCliFrm() 
    {
        frmCliente.style.height = "0";
        frmCliente.style.opacity = "0";
        frmCliente.style.zIndex = "-1";
    }

    function aparecerMsg() 
    {
        cadMsg[0].style.height = "100%"
        cadMsg[0].style.opacity = "1";
        cadMsg[0].style.zIndex = "1";
        cadMsg[0].style.margin = "20px";
    }

    function sumirMsg() 
    {
        cadMsg[0].style.height = "0"
        cadMsg[0].style.opacity = "0";
        cadMsg[0].style.zIndex = "-1";
        cadMsg[0].style.margin = "0";
    }
});

