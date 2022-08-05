<x-guest-layout>
    <div class="showAllArticles">
    </div>;
    <div id="app"> </div>
    <script>

function getRandomInt(max) {
    return Math.floor(Math.random() * max);
}
function apiPicture(){
    fetch('https://collectionapi.metmuseum.org/public/collection/v1/objects/' + getRandomInt(1000))
        .then(function(response){
            return response.json();
        })
        .then(function(picture){
            let image = document.getElementById('image')
            image.setAttribute('src', picture.primaryImage)
        })
        .catch(error=> {
            return error
        })
}



                fetch( '/api/article/')
                    .then(function(response) {
                        return response.json();
                    })
                    .then(function(articles){
                        let html = '';
                        for (let article of articles['data']) {
                            html+=
                                ` <a href="/js/${article.id}">
                        <h3 class="text-xl hover:bg-blue-500">${article.title}</h3></a>
                        <h4>${article.created_at}</h4>
                        <h3><b>Nombre de commentaire :${article.comments_count}</b></h3>
                        <p>${article.content}</p>
                         <img id="image" >`
                            apiPicture()
                        }
                        let app=document.querySelector('#app');
                        app.innerHTML=html;
                    }).catch(error=> {
                    console.log(error)
                })
    </script>
</x-guest-layout>
