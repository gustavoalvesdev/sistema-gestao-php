(function(win, doc) {
    'use strict';

    doc.querySelector('#category').addEventListener('change', async(e) => {
        let req = await fetch(baseUrl + '/controllers/SubcategoriaHandler.php', {
            method: 'post',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            },
            body: `category=${e.target.value}`
        });

        let res = await req.json();
        let selSubcategories = doc.querySelector('#subcategories');

        selSubcategories.options.length = 1;

        res.map((elem, ind, obj) => {
            let opt = doc.createElement('option');
            opt.value = elem.id;
            opt.innerHTML = elem.name;
            selSubcategories.appendChild(opt);
        })
        selSubcategories.removeAttribute('disabled');
    });
})(window, document)