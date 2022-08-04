function getRandomInt(max) {
    return Math.floor(Math.random() * max);
}

fetch('https://collectionapi.metmuseum.org/public/collection/v1/objects/' + getRandomInt(1000))
    .then(function(response) {
        return response.json();
    })
    .then(function(pictures){
        console.log(pictures);
            })
    .catch(error=> {
        console.log(error)
    })


                fetch( '/api/article/')

                    .then(function(response) {
                        return response.json();
                    })
                    .then(function(articles){
                        let html = '';
                        for (let article of articles['data']) {
                            html+=
                                ` <a href="http://bloglaravel.local/js/articles/${article.id}"><h3
                                class="text-xl hover:bg-blue-500">${article.title}</h3></a>
                        <h4>${article.created_at}</h4>
                        <h3><b>Nombre de commentaire :${article.comments_count}</b></h3>
                        <p>${article.content}</p>`

                            let app=document.querySelector('#app');
                            app.innerHTML=html;
                        }
                    }).catch(error=> {
                    console.log(error)
                })
