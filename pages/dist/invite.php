<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=<div class=" container my-3">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <style>
        /* Chrome, Safari, Edge, Opera */
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        /* Firefox */
        input[type=number] {
            -moz-appearance: textfield;
        }

        .qr {
            opacity: 0;
            pointer-events: none;
        }

        .active {
            opacity: 1;
            pointer-events: auto;
        }

        .generate {
            width: 100%;
        }
    </style>
    <title>Admin</title>

</head>

<body>
    <a href="dashboard.php">
        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-arrow-left-square-fill" viewBox="0 0 16 16">
            <path d="M16 14a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12zm-4.5-6.5H5.707l2.147-2.146a.5.5 0 1 0-.708-.708l-3 3a.5.5 0 0 0 0 .708l3 3a.5.5 0 0 0 .708-.708L5.707 8.5H11.5a.5.5 0 0 0 0-1z" />
        </svg>

    </a>

    <div class="container d-flex flex-column">
        <div class="container d-flex flex-column align-items-center">
            <h3 class="my-3">QR Invite Link</h3>
            <div class="form" hidden>
                <input type="text" name="qr" id="input" class="form-control mb-3 generate" placeholder="Enter class code">
                <button class="btn btn-primary generate" id="btn">Generate</button>
            </div>
        </div>
        <div class="container text-center w-100">
            <img style="width: 10rem;" id="qr" class="my-4 d-block qr m-auto" src="" alt="">
            <button class="btn btn-primary qr" id="download">Save QR code</button>
        </div>
    </div>
    </div>

    <script>
        const qr = document.getElementById("qr");
        const input = document.getElementById("input");
        const btn = document.getElementById("btn");
        const download = document.getElementById('download');
        const body = document.body;
        const defaultURL = 'http://localhost/proj_orb/pages/dist/landing.php'; // Set the default URL

        let link;

        // Set the initial QR code value to the default URL
        input.value = defaultURL;
        link = 'https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=' + defaultURL;
        qr.src = link;
        download.classList.add('active');
        qr.classList.add("active");

        btn.addEventListener("click", () => {
            let qrVal = input.value;
            if (!qrVal) return;
            link = 'https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=' + qrVal;
            qr.src = link;
            download.classList.add('active');
            qr.classList.add("active");
        });

        download.addEventListener('click', e => {
            e.preventDefault();
            fetchFile(link);
        });

        function fetchFile(url) {
            fetch(url)
                .then(res => res.blob())
                .then(file => {
                    let tempUrl = URL.createObjectURL(file);
                    let aTag = document.createElement('a');
                    aTag.href = tempUrl;
                    aTag.download = 'qr';
                    body.appendChild(aTag);
                    aTag.click();
                    aTag.remove();
                });
        }
    </script>

</body>

</html>