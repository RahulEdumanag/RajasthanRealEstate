function maxDigitLimit(inputElement, maxLength) {
    $(inputElement).on("input", function () {
        var inputValue = $(this).val();
        var decimalIndex = inputValue.indexOf(".");
        if (decimalIndex !== -1 && decimalIndex <= maxLength) {
            return;
        }
        var trimmedValue = inputValue.substring(0, maxLength);
        $(this).val(trimmedValue);
    });
}
