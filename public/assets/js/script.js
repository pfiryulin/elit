
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

async function getLinks(link){
    let links = document.querySelectorAll(link);
    if(links.length){
        links.forEach(el=>{
            el.addEventListener('click',function(event){
                event.preventDefault()
                let href = el.href;
                let answerBlock ='#app';
                let method = 'GET'
                if(el.getAttribute('data-answerblock') != null){
                    answerBlock = `#${el.dataset.answerblock}`;
                }
                if(el.getAttribute('data-method') != null){
                    method = el.dataset.method;
                }
                let targetBlock =document.querySelector(answerBlock);
                 setRequest(href, method, targetBlock, link);
            })
        })
    }
}

async function setRequest(href, method, targetBlock, link){
    let request = fetch(href);
    request.then((request)=>{
        if(request.ok){
            return request.text();
        }
    }).then((text)=>{
        targetBlock.innerHTML = text;
        setTimeout(getLinks(link), 500);
    })
}

function repeatAddElem(link){
    getLinks(link)
}


getLinks('a');


getForm('form');


