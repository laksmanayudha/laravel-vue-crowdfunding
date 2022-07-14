// soal 1
const luasPersegiPanjang = (panjang, lebar) => panjang * lebar;
const kelilingPersegiPangjang =  (panjang, lebar) => 2*(panjang + lebar);

console.log(luasPersegiPanjang(2, 3));
console.log(kelilingPersegiPangjang(2, 3));

// soal 2
const literal = (firstName, lastName) => ( {firstName, lastName, fullName: () => { console.log(`${firstName} ${lastName}`) }} );

literal("William", "Imoh").fullName();


// soal 3
const newObject = {
    firstName: "Muhammad",
    lastName: "Iqbal Mubarok",
    address: "Jalan Ranamanyar",
    hobby: "playing football",
}

const {firstName, lastName, address, hobby} = newObject;

console.log(firstName, lastName, address, hobby);


// soal 4
const west = ["Will", "Chris", "Sam", "Holly"];
const east = ["Gill", "Brian", "Noel", "Maggie"];
const combined = [...west, ...east];

console.log(combined);


// soal 5
const planet = "earth";
const view = "glass";
let before = `Lorem ${view} dolor sit amet, consectetur adipiscing elit, ${planet}`;

console.log(before)