var string = "falszztysyjzyjkywjrztyjztyynaryjkyswarztyegyyj"
var alphabet = ["a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k", "l", "m", "n", "o", "p", "q", "r", "s", "t", "u", "v", "w", "x", "y", "z"]
var decode = []
var vanh = 26, a = 7, b = 22
var inverseOfA = 15

for (var i = 0; i < string.length; i ++) {
    var ytrub = alphabet.indexOf(string[i]) - b

    if ( ytrub < 0 ) {
       ytrub = ytrub + vanh
    }

    var vitri = (ytrub * inverseOfA) % vanh

    decode.push(alphabet[vitri])
}

console.log(decode.join(""))

