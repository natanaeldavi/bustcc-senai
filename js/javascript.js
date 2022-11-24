// Script mudança de mapa
var cod = document.getElementById('varcodigo');
var codigoponto = cod.value;
var map = document.getElementById('map');

    switch (codigoponto) {

      case "1":
        map.src = "https://www.google.com/maps/d/u/0/embed?mid=14ys5gtTsImWzePoC8ZQNvu5DMMZPVcOk&ehbc=2E312F";
        break;

      case "2":
        map.src = "https://www.google.com/maps/d/u/0/embed?mid=11ACchmMkubP6W_QsbGjQtPcNtcumsfJg&ehbc=2E312F";
        break;

      case "3":
        map.src = "https://www.google.com/maps/d/u/0/embed?mid=1NfQvzgd5lk84bYd5c55YZoOBJf8Tdjg2&ehbc=2E312F";
        break;

      case "01":
        map.src = "https://www.google.com/maps/d/u/0/embed?mid=14ys5gtTsImWzePoC8ZQNvu5DMMZPVcOk&ehbc=2E312F";
        break;

      case "02":
        map.src = "https://www.google.com/maps/d/u/0/embed?mid=11ACchmMkubP6W_QsbGjQtPcNtcumsfJg&ehbc=2E312F";
        break;

      case "03":
        map.src = "https://www.google.com/maps/d/u/0/embed?mid=1NfQvzgd5lk84bYd5c55YZoOBJf8Tdjg2&ehbc=2E312F";
        break;
    }

    // Dropdown page