<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title id="title"></title>
</head>
<body>
    <div class="container">
        <button onclick="history.back(-1)" class="btn btn-warning text-white float-end mt-2">Kembali</button>
        <h1><span id="title"></span></h1>

        <div class="table-responsive">
            <table class="table table-hover" id="dataQuran">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Terjemahan</th>
                        <th>Ayat</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <script>
        loadQuran();

        function loadQuran() {
            let empTable = document.getElementById("dataQuran").getElementsByTagName("tbody")[0];
            empTable.innerHTML = "";

            $.ajax({
                url: 'https://quranapi.idn.sch.id/surah/{{ $id }}',
                type: 'get',
                success: function (response) {
                    $("title, #title").html('Surat ' + response.name)

                    for (let key in response.ayahs) {
                        if (response.ayahs.hasOwnProperty(key)) {
                            let val = response.ayahs[key];
                            let NewRow = empTable.insertRow(-1);
                            let noCell = NewRow.insertCell(0);
                            let terjemahanCell = NewRow.insertCell(1);
                            let ayatCell = NewRow.insertCell(2);

                            noCell.innerHTML = val.verseId;
                            terjemahanCell.innerHTML = val.indoText;
                            ayatCell.innerHTML = val.ayahText;
                        }
                    }
                }
            });
        }
    </script>
</body>
</html>
