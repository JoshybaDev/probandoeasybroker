document.getElementById("formcontactreqgetall").addEventListener("submit",(event)=>
{
    event.preventDefault();
    window.easybroker.findData('','contentcr1','contactreqgetall');
});
document.getElementById("formcontactnew").addEventListener("submit",(event)=>
{
    event.preventDefault();
    window.easybroker.contactsave('formcontactnew','ModalNewContact','contactreqsave');
});
document.getElementById("formpropertiesgetall").addEventListener("submit",(event)=>
{
    event.preventDefault();
    window.easybroker.findData('','contentpro1','propertiesgetall');
});
document.getElementById("formpropertiefindbyid").addEventListener("submit",(event)=>
{
    event.preventDefault();
    window.easybroker.modalInfoPropertieById('','contentpro1byId','properties');
});
document.getElementById("formmlspropertiesgetall").addEventListener("submit",(event)=>
{
    event.preventDefault();
    window.easybroker.findData('','contentmlspro','mslpropertiesgetall');
});
document.getElementById("formmlspropertiefindbyid").addEventListener("submit",(event)=>
{
    event.preventDefault();
    window.easybroker.modalInfoMlsPropertieById('','contentmlsprobyId','mlsproperties');
});
document.getElementById("formmlspropertiefindbyid").addEventListener("submit",(event)=>
{
    event.preventDefault();
    window.easybroker.modalInfoMlsPropertieById('','contentmlsprobyId','mlsproperties');
});
document.getElementById("formlocationsfindbyid").addEventListener("submit",(event)=>
{
    event.preventDefault();
    window.easybroker.searchlocation('','contentlocation','locations');
});
window.easybroker = {
    msg_global_ajax:document.getElementById("msg_global_ajax"),
    propertyId:document.getElementById("id"),
    mlspropertyId:document.getElementById("idmls"),
    conactnewmsg:document.getElementById("conactnewmsg"),
    locationdata:document.getElementById("locationdata"),
    modalProcess:new bootstrap.Modal(document.getElementById('processModal'), {keyboard: false}),
    modalContactNew:new bootstrap.Modal(document.getElementById('ModalNewContact'), {keyboard: false}),
    modalShowPropertyById:new bootstrap.Modal(document.getElementById('ModalShowPropertyById'), {keyboard: false}),
    ModalShowMlsPropertyById:new bootstrap.Modal(document.getElementById('ModalShowMlsPropertyById'), {keyboard: false}),
    alertsucess:(msg)=>
    {
        return `<div class="alert alert-success"><i class="bi bi-tropical-storm"></i>${msg}</div>`;
    },
    alertdanger:(msg)=>
    {
        return `<div class="alert alert-danger"><i class="bi bi-tropical-storm"></i>${msg}</div>`;
    },      
    findData : (xFormText,content,url) =>
    {
        easybroker.msg_global_ajax.innerHTML=easybroker.alertsucess("Processing ...");
        easybroker.modalProcess.show();        
        axios.get(url).then((res) =>{
            if(res.status==200)
            {
                easybroker.reset();
                document.getElementById(content).innerHTML=res.data;
            }
            else
            easybroker.msg_global_ajax.innerHTML=easybroker.alertdanger("Error");
        })
        .catch(function (error) {
            console.log("error",error);
            easybroker.reset(easybroker.alertdanger(error));
          })        
        ;        
    },
    findNext:(content,url)=>
    {
        easybroker.msg_global_ajax.innerHTML=easybroker.alertsucess("Processing ...");
        easybroker.modalProcess.show();
        axios.get(url).then((res) =>{          
            if(res.status==200)
            {
                easybroker.reset();
                document.getElementById(content).innerHTML=res.data;
            }
            else
            easybroker.msg_global_ajax.innerHTML=easybroker.alertdanger("Error");
        })
        .catch(function (error) {
            console.log("error",error);
            easybroker.reset(easybroker.alertdanger(error));
          })        
        ;
    },
    reset:(msg="") =>
    {
        easybroker.msg_global_ajax.innerHTML=msg;
        easybroker.modalProcess.hide();
    },
    contactsave: (xFormText,content,url) =>
    {
        easybroker.conactnewmsg.innerHTML=easybroker.alertsucess("Processing ...");    
        let xForm = document.getElementById(xFormText);
        let data=new FormData(xForm);
        axios.post(url,data).then((res) =>
        {
            if(res.status==200)
            {
                easybroker.conactnewmsg.innerHTML=res.data;
                setTimeout(()=>{
                    easybroker.contactreset();
                    xForm.reset();
                },3000);
            }
            else
            easybroker.conactnewmsg.innerHTML=easybroker.alertdanger("Error");
        })
        .catch(function (error) {
            console.log("error",error);
            easybroker.reset(easybroker.alertdanger(error));
        })        
        ;
    },
    contactreset:()=>
    {
        easybroker.modalContactNew.hide();
        easybroker.conactnewmsg.innerHTML="";
    },
    modalInfoPropertieById:(xFormText,content,url)=>
    {
        easybroker.msg_global_ajax.innerHTML=easybroker.alertsucess("Processing ...");
        easybroker.modalProcess.show();        
        axios.get(url+"/"+easybroker.propertyId.value).then((res) =>{
            if(res.status==200)
            {
                easybroker.reset();
                easybroker.modalShowPropertyById.show();
                document.getElementById(content).innerHTML=res.data;
            }
            else
            easybroker.msg_global_ajax.innerHTML=easybroker.alertdanger("Error");
        })
        .catch(function (error) {
            console.log("error",error);
            easybroker.reset(easybroker.alertdanger(error));
          })        
        ; 
    },
    modalInfoMlsPropertieById:(xFormText,content,url)=>
    {
        easybroker.msg_global_ajax.innerHTML=easybroker.alertsucess("Processing ...");
        easybroker.modalProcess.show();        
        axios.get(url+"/"+easybroker.mlspropertyId.value).then((res) =>{
            if(res.status==200)
            {
                easybroker.reset();
                easybroker.ModalShowMlsPropertyById.show();
                document.getElementById(content).innerHTML=res.data;
            }
            else
            easybroker.msg_global_ajax.innerHTML=easybroker.alertdanger("Error");
        })
        .catch(function (error) {
            console.log("error",error);
            easybroker.reset(easybroker.alertdanger(error));
          })        
        ; 
    },
    searchlocation:(xFormText,content,url)=>
    {
        easybroker.msg_global_ajax.innerHTML=easybroker.alertsucess("Processing ...");
        easybroker.modalProcess.show();  
        if(!easybroker.locationdata.value=="")
        {
            url=url+"/"+easybroker.locationdata.value;
        }      
        axios.get(url).then((res) =>{
            if(res.status==200)
            {
                easybroker.reset();
                document.getElementById(content).innerHTML=res.data;
            }
            else
            easybroker.msg_global_ajax.innerHTML=easybroker.alertdanger("Error");
        })
        .catch(function (error) {
            console.log("error",error);
            easybroker.reset(easybroker.alertdanger(error));
          })        
        ; 
    }            
}

