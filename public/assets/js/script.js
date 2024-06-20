
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
                event.preventDefault();
                let href;
                let answerBlock ='#app';
                let method = 'GET';
                let body;
                if(el.hasAttribute('method') && el.hasAttribute('action')){
                    if(el.method != null){
                        method - el.method;
                    }
                    if(el.action != null){
                        href = el.action;
                    }

                    let inputs = el.querySelectorAll('input, select');
                    if(inputs.length){
                        body = {};
                        inputs.forEach(function(inp){
                            if(inp.type != submit){
                                body[inp.name] = inp.value;
                            }
                        })
                        body = JSON.stringify(body)
                    }
                }else if(el.hasAttribute('href') && el.hasAttribute('data-method') && el.href != null && el.dataset.method != null){
                    href = el.href;
                    method = el.dataset.method;
                }
                if(el.getAttribute('data-answerblock') != null){
                    answerBlock = `#${el.dataset.answerblock}`;
                }
                let targetBlock =document.querySelector(answerBlock);
                 setRequest(href, method, targetBlock, link, body);
            })
        })
    }
}

async function setRequest(href, method, targetBlock, link, body){
    let request
    if(method=="GET"){
        request = fetch(href);
    }else{
        request = fetch(href, {
            method: method,
            body: body
        });
    }
    request.then((request)=>{
        if(request.ok){
            return request.text();
        }
    }).then((text)=>{
        targetBlock.innerHTML = text;
        setTimeout(update(), 500);
    })
}

function repeatAddElem(link){
    getLinks(link)
}

function update(){
    getLinks('a');
    getForm('form');
}

update();


