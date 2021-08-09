// var a = "lrvmnir bpr sumvbwvr jx bpr lmiwv yjeryrkbi jx qmbm wi bpr xjvni mkd ymibrut jx irhx wi bpr riirkvr jx ymbinlmtmipw utn qmumbr dj w ipmhh but bj rhnvwdmbr bpr yjeryrkbi jx bpr qmbm mvvjudwko bj yt wkbrusurbmbwjk lmird jk xjubt trmui jx ibndt"
var a = "attack"
displayPercent = {}

for (var i = 0; i < a.length; i ++) {
	if (displayPercent[a[i]] && a[i] !== " ") {
		displayPercent[a[i]] += 1
	} else if (a[i] !== " ") {
		displayPercent[a[i]] = 1
	}
}

for (key in displayPercent) {

	displayPercent[key] = {
		display: displayPercent[key],
		percent: displayPercent[key] / a.length
	} 
}

console.log(displayPercent)
