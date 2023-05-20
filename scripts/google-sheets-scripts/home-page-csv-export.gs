function homePageWriteDataForCSVExport() {
	// Get source data
	var inputSheetSheet = SpreadsheetApp.openById('1pYRb1ULnAUHxtiRUFk-JRIB4deI0bPvL8lbiBdbz4lY').getSheetByName('Home');
	var inputSheetLastRow = inputSheetSheet.getLastRow();
	var inputSheetLastCol = inputSheetSheet.getLastColumn();
	var inputSheetData = inputSheetSheet.getDataRange().getDisplayValues();

	// Set o/p data
	var outputSheet = SpreadsheetApp.openById('1tramq9QY-ZITDfv8gvaBq0kyFSCvFhcUqiI8O6YLlsA').getSheetByName('home-page-export');

	// Set rows, cols to skipped from outputting
	var skipInputRows = [0, 1, 2, 3];
	var skipInputCols = [0];

	// Set repetable fields, sub-fields array
	var repetableFieldNames = ['banners', 'success-story', 'principles'];
	var repetableFieldSubfields = {
		'banners': ['quote', 'text', 'quote-by', 'quote-by-designation'],
		'success-story': ['title', 'text'],
		'principles': ['title', 'text']
	};

	// Set o/p row counter
	var opRowNo = 1;

	// Loop through all input sheet rows
	for (ipRowNo = 0; ipRowNo < inputSheetLastRow; ipRowNo++) {
		// Skip rows
		if (skipInputRows.includes(ipRowNo)) {
			console.log('Skipping row ' + ipRowNo);
			continue;
		}
		// When not skipping row, we will be outputting same so increment o/p row counter
		else {
			opRowNo++;
		}

		// IMP - to init currentFieldValue, o/p cols counter for each new row
		var currentFieldValue = '';
		var opColNo = 0;

		// Loop through all input sheet cols
		for (ipColNo = 0; ipColNo < inputSheetLastCol; ipColNo++) {
			// IMP - to init write o/p flag inside this loop
			var writeOutputFlag = 0;

			// Skip cols
			if (skipInputCols.includes(ipColNo)) {
				console.log('Skipping col ' + ipColNo);
				continue;
			}

			console.log('Data row      > ' + ipRowNo + ' Data col   > ' + ipColNo);
			console.log('Actual row    > ' + (ipRowNo + 1) + ' Actual col > ' + (ipColNo + 1));
			console.log('** Processing Content > ' + inputSheetData[ipRowNo][ipColNo]);

			// If current fields is a repetable field
			if (repetableFieldNames.includes(inputSheetData[0][ipColNo])) {
				// If current field value is not empty, and,
				// And, current field is first field of the repetable set, banners[0] => quote
				// And, current field value is not empty
				// Add repeat field separator ~
				if (
					currentFieldValue !== ''
					&& (inputSheetData[1][ipColNo] == repetableFieldSubfields[inputSheetData[0][ipColNo]][0])
					&& inputSheetData[ipRowNo][ipColNo] !== ''
				) {
					// Next reeptable record is seperated by ~
					currentFieldValue += '~';
				}

				// If current field is part of repertable field's subfields
				if (
					repetableFieldSubfields[inputSheetData[0][ipColNo]].includes(inputSheetData[1][ipColNo])
					&& inputSheetData[ipRowNo][ipColNo] !== ''
				) {
					// If current field is not the last subfield from repetable field's subfields
					if (inputSheetData[1][ipColNo] !== repetableFieldSubfields[inputSheetData[0][ipColNo]][repetableFieldSubfields[inputSheetData[0][ipColNo]].length - 1]) {
						// fieldName#fieldValue|
						currentFieldValue += inputSheetData[1][ipColNo] + '#' + inputSheetData[ipRowNo][ipColNo] + '|';
					}
					// If current field is the last subfield from repetable field's subfields
					else {
						// fieldName#fieldValue
						currentFieldValue += inputSheetData[1][ipColNo] + '#' + inputSheetData[ipRowNo][ipColNo];
					}
				}

				// Write calculated repetable cell value to cell ONLY if next cell is not the repetable field
				if (inputSheetData[0][ipColNo + 1] != inputSheetData[0][ipColNo]) {
					opColNo++;
					writeOutputFlag = 1;
					outputSheet.getRange(opRowNo, opColNo).setValue(currentFieldValue);
					currentFieldValue = '';
				}
			}
			// Non-repetable fields, process directly
			else {
				currentFieldValue = inputSheetData[ipRowNo][ipColNo];

				opColNo++;
				writeOutputFlag = 1;
				outputSheet.getRange(opRowNo, opColNo).setValue(currentFieldValue);
				currentFieldValue = '';
			}

			// Set column header at [1st row][ipColNo col] if write o/p flag is set
			if (writeOutputFlag == 1) {
				outputSheet.getRange(1, opColNo).setValue(inputSheetData[0][ipColNo]);
			}
		}
	}
}
