var now = new Date();
var start = new Date(now.getYear(), now.getMonth(), now.getDay(), 8)
$("#time").timePicker({
	startTime: start,
	endTime: now,
	show24Hours:false,
	separator: ':',
	step: 5
})
$("time-picker ul").menu()