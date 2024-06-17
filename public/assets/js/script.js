function getForm(targetForm){
    let forms = document.querySelectorAll('form');
    if(forms.length){
        forms.forEach(function(el){
            el.addEventListener('submit',function(){
                event.preventDefault();
                getData(el)
            })
        })
    }
}

getForm('form');
async function getData(el){
    let hendler = el.action;
    let data = new FormData(el);
    let request = await fetch(hendler,{
        method: 'POST',
        headers:{
            'X-CSRF-Token': data.get('_token'),
           "Accept": "application/json",
        },
        body: data,
        // body: 'Helo',
    });
    if(request.ok){
        let answer = await request.text();
        console.log(answer);
        app.innerHTML = answer;
    }else{
        console.log(request.status);
    }
}


