document.getElementById("formcontactreqgetall").addEventListener("submit",(event)=>
{
    event.preventDefault();
    window.easybroker.findData('','contentcr1','contactreqgetall');
});
window.easybroker = {
    findData : (form,content,url) =>
    {
        axios.get(url).then((res) =>{
            console.log(res);
            document.getElementById(content).innerHTML=res.data;
        });
    },
    findNext:(content,url)=>
    {
        console.log("findNext",url);
        axios.get(url).then((res) =>{
            console.log(res);
            document.getElementById(content).innerHTML=res.data;
        });
    }
}

