/*******************************************************************************
 * * The contents of this file are subject to file_converter Public License
 * Version 1.0 ("License"); You may not use this file except in compliance with
 * the License The Original Code is: file_converter The Initial Developer of the
 * Original Code is Krishia Valencia. All Rights Reserved.
 *
 ******************************************************************************/

var LIST = function(result) {
	responseName = null;
	errorCode = "";
	errorMsg = "";
	data = [];

	result = JSON.parse(result);
	this.setResponseName(result);
	this.setErrorCode(result);
	this.setErrorMsg(result);
	this.setData(result);
	console.log(this);
}

// get responseName
LIST.prototype.getResponseName = function() {
	return this.responseName;
}

// set responseName
LIST.prototype.setResponseName = function(result) {
	this.responseName = result.responseName;
}

// get data
LIST.prototype.getData = function() {
	return this.data;
}

// set data
LIST.prototype.setData = function(result) {
	this.data = result.data;
}

// get errorCode
LIST.prototype.getErrorCode = function() {
	return this.errorCode;
}

// set errorCode
LIST.prototype.setErrorCode = function(result) {
	this.errorCode = result.errorCode;
}

// get errorMsg
LIST.prototype.getErrorMsg = function() {
	return this.errorMsg;
}

// set errorCode
LIST.prototype.setErrorMsg = function(result) {
	this.errorMsg = result.errorMsg;
}