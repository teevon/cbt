function getSelected(){
	var currQ, q, nListLength, ans;
	q = 1;
	currQ = document.getElementsByClassName("q"+q);
	nListLength = currQ.length;
	for (;q-1 < nListLength; q++) {
		if (currQ[q-1].checked === true){
			ans = currQ[q-1];
			return ans;
		}
	}
}

function getAnswers(){
	var allChoices = [];
	allQdivs = document.getElementsByClassName("prob");
	tq = allQdivs.length+1;
	q = 1;
	while(q < tq){
		opts = allQdivs[q-1].getElementsByClassName("q"+q);
		tOpts = opts.length;
		for(i=0;i<tOpts;i++) {
			if (opts[i].checked === true) {
				choice = opts[i];
				allChoices[q-1] = choice.value;  
			}
		}
		q++;
	}
	return allChoices;	
}
