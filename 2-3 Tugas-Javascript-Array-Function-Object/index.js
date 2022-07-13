// soal 1
var daftarHewan = ["2. Komodo", "5. Buaya", "3. Cicak", "4. Ular", "1. Tokek"];
for(var i = 0; i < daftarHewan.length; i++){
    for(var j = i+1; j <= daftarHewan.length; j++){
        if(daftarHewan[i] > daftarHewan[j]){
            temp = daftarHewan[i];
            daftarHewan[i] = daftarHewan[j];
            daftarHewan[j] = temp;
        }
    }
}

console.log(daftarHewan);


// soal 2
function introduce({name, age, address, hobby}){
    return `Nama saya ${name}, umur saya ${age} tahun, alamat saya di ${address}, dan saya punya hobby yaitu ${hobby}!`
}
 
var data = {name : "John" , age : 30 , address : "Jalan Pelesiran" , hobby : "Gaming" }
 
var perkenalan = introduce(data)
console.log(perkenalan)


// soal 3
function hitung_huruf_vokal (data){
    var count = 0;
    var vocal = ['a', 'i', 'u', 'e', 'o'];
    for(let chr of data){
        if(vocal.includes(chr.toLowerCase())){
            count ++;
        }
    }
    return count;
}


var hitung_1 = hitung_huruf_vokal("Muhammad")
var hitung_2 = hitung_huruf_vokal("Iqbal")
console.log(hitung_1 , hitung_2) // 3 2


// soal 4

function hitung(number){
    return 2 * number - 2;
}

console.log( hitung(0) ) // -2
console.log( hitung(1) ) // 0
console.log( hitung(2) ) // 2
console.log( hitung(3) ) // 4
console.log( hitung(5) ) // 8

