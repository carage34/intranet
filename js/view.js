$(function () {
    var cat = $('#cat').text();
    var scat = $('#scat').text();
    console.log("cat: "+cat);
    console.log("scat: "+scat);
    var current = 0;
    var nb = 0;
    $.ajax({
        url: "view/getNumberOfThing",
        type: "POST",
        dataType: 'JSON',
        data: {"cat": cat, "scat": scat},
        success: function (data) {
            $.each(data, function (index, item) {
                console.log("item :" + item);
                tmp = index + 1;
                $("#th" + tmp).append(item);
            });
        }
    });


    $('#th1').parent().click(function (e) {
        current = 1;
        nb = 0;
        update(current);
        $.ajax({
            url: "view/getContenu",
            type: "POST",
            dataType: "JSON",
            data: {"cat": 1, "scat": 1, "contenu": "file"},
            success: function (data) {
                nb = data.length;
                nb--;
                $.each(data, function (index, item) {
                    console.log(index);
                    container = document.createElement("div");
                    div = createDivFile(item.titre, item.nom, item.description, current);
                    container.append(div);
                    if (item.extension === "txt") {
                        file = createDivContentText(current, item.nom);
                        div.append(file);
                    }
                    if((item.extension==="doc")||(item.extension==="docx")) {
                        file = createDivContent
                    }
                    $('#cont').append(container);
                    $("button + div.card").hide();
                    if (nb === index) {
                        $(".plz").click(function () {
                            $(this).next().toggle();
                            //$(".card-header").toggle();
                        });
                    }
                });
            }
        });

    });

    function update(current) {
        $('#th1').parent().prop("disabled", false);
        $('#th2').parent().prop("disabled", false);
        $('#th3').parent().prop("disabled", false);
        $('#th4').parent().prop("disabled", false);
        $("#th" + current).parent().prop("disabled", true);
    }

    function createDivFile(titre, nom, description, current) {
        div = document.createElement("div");
        desc = document.createElement("p");
        div = document.createElement("div");
        div.setAttribute("id", "div" + current);
        titreL = document.createElement("h4");
        titreL.append("Titre : " + titre);
        nomL = document.createElement("p");
        nomL.append("Nom du fichier : " + nom);
        if (description != null) {
            desc.append("Description :" + description);
        }
        div.append(titreL);
        div.append(nomL);
        if (description != null) {
            div.append(desc);
        }
        hr = document.createElement("hr");
        btn = document.createElement("button");
        btn.classList.add("btn");
        btn.classList.add("btn-outline-primary");
        btn.classList.add("plz")
        btn.setAttribute("id", "btn" + current);
        btn.append("Afficher le fichier");
        br = document.createElement("br");
        div.append(btn);
        return div;
    }

    function createDivContentText(current, f) {
        var filename = f;
        card = document.createElement("div");
        card.classList.add("card");
        content = document.createElement("div");
        card.append(content);
        p = document.createElement("p");
        p.style.whiteSpace = "pre-wrap";
        content.append(p);
        content.classList.add("card-header");
        $.ajax({
            async: false,
            url: "upload/" + filename,
            dataType: "text",
            success: function (data) {
                p.append(data);
            }
        });
        return card;
    }
});