const getLastDay = (year, month) => {
    return new Date(year, month, 0).getDate();
};

var mday = getLastDay(2021, 4);

function AllCheckedA() {
    var all = document.form.alla.checked;
    for (var i = 1; i <= mday * 12; i++) {
        document.form.elements[`a[${i}]`].checked = all;
    }

    for (var i = 1; i <= 12; i++) {
        document.form.elements[`a${i}`].checked = all;
    }

    for (var i = 1; i <= mday; i++) {
        document.form.elements[`ad${i}`].checked = all;
    }
}

function DisChecked() {
    var checksCount1 = 0;
    var checksCount2 = 0;
    var checksCount3 = 0;
    var checksCount4 = 0;
    var checksCount5 = 0;
    var checksCount6 = 0;
    var checksCount7 = 0;
    var checksCount8 = 0;
    var checksCount9 = 0;
    var checksCount10 = 0;
    var checksCount11 = 0;
    var checksCount12 = 0;
    var checksCount13 = 0;
    for (var i = 1; i <= mday * 12; i++) {
        var checks = document.form.elements[`a[${i}]`].checked;
        if (checks == false) {
            document.form.alla.checked = false;
        }
        else {
            checksCount1 += 1;
            if (checksCount1 == mday * 12) {
                document.form.alla.checked = true;
            }
        }

        if (i <= mday) {
            if (checks == false) {
                document.form.a1.checked = false;
            }
            else {
                checksCount2 += 1;
                if (checksCount2 == mday) {
                    document.form.a1.checked = true;
                }
            }
        }

        if (mday + 1 <= i && i <= mday * 2) {
            if (checks == false) {
                document.form.a2.checked = false;
            }
            else {
                checksCount3 += 1;
                if (checksCount3 == mday) {
                    document.form.a2.checked = true;
                }
            }
        }

        if (mday * 2 + 1 <= i && i <= mday * 3) {
            if (checks == false) {
                document.form.a3.checked = false;
            }
            else {
                checksCount4 += 1;
                if (checksCount4 == mday) {
                    document.form.a3.checked = true;
                }
            }
        }

        if (mday * 3 + 1 <= i && i <= mday * 4) {
            if (checks == false) {
                document.form.a4.checked = false;
            }
            else {
                checksCount5 += 1;
                if (checksCount5 == mday) {
                    document.form.a4.checked = true;
                }
            }
        }

        if (mday * 4 + 1 <= i && i <= mday * 5) {
            if (checks == false) {
                document.form.a5.checked = false;
            }
            else {
                checksCount6 += 1;
                if (checksCount6 == mday) {
                    document.form.a5.checked = true;
                }
            }
        }

        if (mday * 5 + 1 <= i && i <= mday * 6) {
            if (checks == false) {
                document.form.a6.checked = false;
            }
            else {
                checksCount7 += 1;
                if (checksCount7 == mday) {
                    document.form.a6.checked = true;
                }
            }
        }

        if (mday * 6 + 1 <= i && i <= mday * 7) {
            if (checks == false) {
                document.form.a7.checked = false;
            }
            else {
                checksCount8 += 1;
                if (checksCount8 == mday) {
                    document.form.a7.checked = true;
                }
            }
        }

        if (mday * 7 + 1 <= i && i <= mday * 8) {
            if (checks == false) {
                document.form.a8.checked = false;
            }
            else {
                checksCount9 += 1;
                if (checksCount9 == mday) {
                    document.form.a8.checked = true;
                }
            }
        }

        if (mday * 8 + 1 <= i && i <= mday * 9) {
            if (checks == false) {
                document.form.a9.checked = false;
            }
            else {
                checksCount10 += 1;
                if (checksCount10 == mday) {
                    document.form.a9.checked = true;
                }
            }
        }

        if (mday * 9 + 1 <= i && i <= mday * 10) {
            if (checks == false) {
                document.form.a10.checked = false;
            }
            else {
                checksCount11 += 1;
                if (checksCount11 == mday) {
                    document.form.a10.checked = true;
                }
            }
        }

        if (mday * 10 + 1 <= i && i <= mday * 11) {
            if (checks == false) {
                document.form.a11.checked = false;
            }
            else {
                checksCount12 += 1;
                if (checksCount12 == mday) {
                    document.form.a11.checked = true;
                }
            }
        }

        if (mday * 11 + 1 <= i && i <= mday * 12) {
            if (checks == false) {
                document.form.a12.checked = false;
            }
            else {
                checksCount13 += 1;
                if (checksCount13 == mday) {
                    document.form.a12.checked = true;
                }
            }
        }
    }

    for (var j = 1; j <= mday; j++) {
        var checksCount = 0;
        for (var i = 0; i < 12; i++) {
            var k = i * mday + j;
            var checks = document.form.elements[`a[${k}]`].checked;
            if (checks == false) {
                document.form.elements[`ad${j}`].checked = false;
            }
            else {
                checksCount += 1;
                if (checksCount == 12) {
                    document.form.elements[`ad${j}`].checked = true;
                }
            }
        }
    }
}

function A1Checked() {
    var a1 = document.form.a1.checked;
    for (var i = 1; i <= mday; i++) {
        document.form.elements[`a[${i}]`].checked = a1;
    }
}

function A2Checked() {
    var a2 = document.form.a2.checked;
    for (var i = mday + 1; i <= mday * 2; i++) {
        document.form.elements[`a[${i}]`].checked = a2;
    }
}

function A3Checked() {
    var a3 = document.form.a3.checked;
    for (var i = mday * 2 + 1; i <= mday * 3; i++) {
        document.form.elements[`a[${i}]`].checked = a3;
    }
}

function A4Checked() {
    var a4 = document.form.a4.checked;
    for (var i = mday * 3 + 1; i <= mday * 4; i++) {
        document.form.elements[`a[${i}]`].checked = a4;
    }
}

function A5Checked() {
    var a5 = document.form.a5.checked;
    for (var i = mday * 4 + 1; i <= mday * 5; i++) {
        document.form.elements[`a[${i}]`].checked = a5;
    }
}

function A6Checked() {
    var a6 = document.form.a6.checked;
    for (var i = mday * 5 + 1; i <= mday * 6; i++) {
        document.form.elements[`a[${i}]`].checked = a6;
    }
}

function A7Checked() {
    var a7 = document.form.a7.checked;
    for (var i = mday * 6 + 1; i <= mday * 7; i++) {
        document.form.elements[`a[${i}]`].checked = a7;
    }
}

function A8Checked() {
    var a8 = document.form.a8.checked;
    for (var i = mday * 7 + 1; i <= mday * 8; i++) {
        document.form.elements[`a[${i}]`].checked = a8;
    }
}

function A9Checked() {
    var a9 = document.form.a9.checked;
    for (var i = mday * 8 + 1; i <= mday * 9; i++) {
        document.form.elements[`a[${i}]`].checked = a9;
    }
}

function A10Checked() {
    var a10 = document.form.a10.checked;
    for (var i = mday * 9 + 1; i <= mday * 10; i++) {
        document.form.elements[`a[${i}]`].checked = a10;
    }
}

function A11Checked() {
    var a11 = document.form.a11.checked;
    for (var i = mday * 10 + 1; i <= mday * 11; i++) {
        document.form.elements[`a[${i}]`].checked = a11;
    }
}

function A12Checked() {
    var a12 = document.form.a12.checked;
    for (var i = mday * 11 + 1; i <= mday * 12; i++) {
        document.form.elements[`a[${i}]`].checked = a12;
    }
}

function Ad1Checked() {
    var ad1 = document.form.ad1.checked;
    for (var i = 0; i < 12; i++) {
        var j = i * mday + 1;
        document.form.elements[`a[${j}]`].checked = ad1;
    }
}

function Ad2Checked() {
    var ad2 = document.form.ad2.checked;
    for (var i = 0; i < 12; i++) {
        var j = i * mday + 2;
        document.form.elements[`a[${j}]`].checked = ad2;
    }
}

function Ad3Checked() {
    var ad3 = document.form.ad3.checked;
    for (var i = 0; i < 12; i++) {
        var j = i * mday + 3;
        document.form.elements[`a[${j}]`].checked = ad3;
    }
}

function Ad4Checked() {
    var ad4 = document.form.ad4.checked;
    for (var i = 0; i < 12; i++) {
        var j = i * mday + 4;
        document.form.elements[`a[${j}]`].checked = ad4;
    }
}

function Ad5Checked() {
    var ad5 = document.form.ad5.checked;
    for (var i = 0; i < 12; i++) {
        var j = i * mday + 5;
        document.form.elements[`a[${j}]`].checked = ad5;
    }
}

function Ad6Checked() {
    var ad6 = document.form.ad6.checked;
    for (var i = 0; i < 12; i++) {
        var j = i * mday + 6;
        document.form.elements[`a[${j}]`].checked = ad6;
    }
}

function Ad7Checked() {
    var ad7 = document.form.ad7.checked;
    for (var i = 0; i < 12; i++) {
        var j = i * mday + 7;
        document.form.elements[`a[${j}]`].checked = ad7;
    }
}

function Ad8Checked() {
    var ad8 = document.form.ad8.checked;
    for (var i = 0; i < 12; i++) {
        var j = i * mday + 8;
        document.form.elements[`a[${j}]`].checked = ad8;
    }
}

function Ad9Checked() {
    var ad9 = document.form.ad9.checked;
    for (var i = 0; i < 12; i++) {
        var j = i * mday + 9;
        document.form.elements[`a[${j}]`].checked = ad9;
    }
}

function Ad10Checked() {
    var ad10 = document.form.ad10.checked;
    for (var i = 0; i < 12; i++) {
        var j = i * mday + 10;
        document.form.elements[`a[${j}]`].checked = ad10;
    }
}

function Ad11Checked() {
    var ad11 = document.form.ad11.checked;
    for (var i = 0; i < 12; i++) {
        var j = i * mday + 11;
        document.form.elements[`a[${j}]`].checked = ad11;
    }
}

function Ad12Checked() {
    var ad12 = document.form.ad12.checked;
    for (var i = 0; i < 12; i++) {
        var j = i * mday + 12;
        document.form.elements[`a[${j}]`].checked = ad12;
    }
}

function Ad13Checked() {
    var ad13 = document.form.ad13.checked;
    for (var i = 0; i < 12; i++) {
        var j = i * mday + 13;
        document.form.elements[`a[${j}]`].checked = ad13;
    }
}

function Ad14Checked() {
    var ad14 = document.form.ad14.checked;
    for (var i = 0; i < 12; i++) {
        var j = i * mday + 14;
        document.form.elements[`a[${j}]`].checked = ad14;
    }
}

function Ad15Checked() {
    var ad15 = document.form.ad15.checked;
    for (var i = 0; i < 12; i++) {
        var j = i * mday + 15;
        document.form.elements[`a[${j}]`].checked = ad15;
    }
}

function Ad16Checked() {
    var ad16 = document.form.ad16.checked;
    for (var i = 0; i < 12; i++) {
        var j = i * mday + 16;
        document.form.elements[`a[${j}]`].checked = ad16;
    }
}

function Ad17Checked() {
    var ad17 = document.form.ad17.checked;
    for (var i = 0; i < 12; i++) {
        var j = i * mday + 17;
        document.form.elements[`a[${j}]`].checked = ad17;
    }
}

function Ad18Checked() {
    var ad18 = document.form.ad18.checked;
    for (var i = 0; i < 12; i++) {
        var j = i * mday + 18;
        document.form.elements[`a[${j}]`].checked = ad18;
    }
}

function Ad19Checked() {
    var ad19 = document.form.ad19.checked;
    for (var i = 0; i < 12; i++) {
        var j = i * mday + 19;
        document.form.elements[`a[${j}]`].checked = ad19;
    }
}

function Ad20Checked() {
    var ad20 = document.form.ad20.checked;
    for (var i = 0; i < 12; i++) {
        var j = i * mday + 20;
        document.form.elements[`a[${j}]`].checked = ad20;
    }
}

function Ad21Checked() {
    var ad21 = document.form.ad21.checked;
    for (var i = 0; i < 12; i++) {
        var j = i * mday + 21;
        document.form.elements[`a[${j}]`].checked = ad21;
    }
}

function Ad22Checked() {
    var ad22 = document.form.ad22.checked;
    for (var i = 0; i < 12; i++) {
        var j = i * mday + 22;
        document.form.elements[`a[${j}]`].checked = ad22;
    }
}

function Ad23Checked() {
    var ad23 = document.form.ad23.checked;
    for (var i = 0; i < 12; i++) {
        var j = i * mday + 23;
        document.form.elements[`a[${j}]`].checked = ad23;
    }
}

function Ad24Checked() {
    var ad24 = document.form.ad24.checked;
    for (var i = 0; i < 12; i++) {
        var j = i * mday + 24;
        document.form.elements[`a[${j}]`].checked = ad24;
    }
}

function Ad25Checked() {
    var ad25 = document.form.ad25.checked;
    for (var i = 0; i < 12; i++) {
        var j = i * mday + 25;
        document.form.elements[`a[${j}]`].checked = ad25;
    }
}

function Ad26Checked() {
    var ad26 = document.form.ad26.checked;
    for (var i = 0; i < 12; i++) {
        var j = i * mday + 26;
        document.form.elements[`a[${j}]`].checked = ad26;
    }
}

function Ad27Checked() {
    var ad27 = document.form.ad27.checked;
    for (var i = 0; i < 12; i++) {
        var j = i * mday + 27;
        document.form.elements[`a[${j}]`].checked = ad27;
    }
}

function Ad28Checked() {
    var ad28 = document.form.ad28.checked;
    for (var i = 0; i < 12; i++) {
        var j = i * mday + 28;
        document.form.elements[`a[${j}]`].checked = ad28;
    }
}

function Ad29Checked() {
    var ad29 = document.form.ad29.checked;
    for (var i = 0; i < 12; i++) {
        var j = i * mday + 29;
        document.form.elements[`a[${j}]`].checked = ad29;
    }
}

function Ad30Checked() {
    var ad30 = document.form.ad30.checked;
    for (var i = 0; i < 12; i++) {
        var j = i * mday + 30;
        document.form.elements[`a[${j}]`].checked = ad30;
    }
}

function Ad31Checked() {
    var ad31 = document.form.ad31.checked;
    for (var i = 0; i < 12; i++) {
        var j = i * mday + 31;
        document.form.elements[`a[${j}]`].checked = ad31;
    }
}

function AllCheckedB() {
    var all = document.form.allb.checked;
    for (var i = 1; i <= mday*12; i++) {
        document.form.elements[`b[${i}]`].checked = all;
    }

    for (var i = 1; i <= 12; i++) {
        document.form.elements[`b${i}`].checked = all;
    }

    for (var i = 1; i <= mday; i++) {
        document.form.elements[`bd${i}`].checked = all;
    }
}

function DisCheckedB() {
    var checksCount1 = 0;
    var checksCount2 = 0;
    var checksCount3 = 0;
    var checksCount4 = 0;
    var checksCount5 = 0;
    var checksCount6 = 0;
    var checksCount7 = 0;
    var checksCount8 = 0;
    var checksCount9 = 0;
    var checksCount10 = 0;
    var checksCount11 = 0;
    var checksCount12 = 0;
    var checksCount13 = 0;
    for (var i = 1; i <= mday*12; i++) {
        var checks = document.form.elements[`b[${i}]`].checked;
        if (checks == false) {
            document.form.allb.checked = false;
        }
        else {
            checksCount1 += 1;
            if (checksCount1 == mday*12) {
                document.form.allb.checked = true;
            }
        }

        if (i <= mday) {
            if (checks == false) {
                document.form.b1.checked = false;
            }
            else {
                checksCount2 += 1;
                if (checksCount2 == mday) {
                    document.form.b1.checked = true;
                }
            }
        }

        if (mday+1 <= i && i <= mday*2) {
            if (checks == false) {
                document.form.b2.checked = false;
            }
            else {
                checksCount3 += 1;
                if (checksCount3 == mday) {
                    document.form.b2.checked = true;
                }
            }
        }

        if (mday*2+1 <= i && i <= mday*3) {
            if (checks == false) {
                document.form.b3.checked = false;
            }
            else {
                checksCount4 += 1;
                if (checksCount4 == mday) {
                    document.form.b3.checked = true;
                }
            }
        }

        if (mday*3+1 <= i && i <= mday*4) {
            if (checks == false) {
                document.form.b4.checked = false;
            }
            else {
                checksCount5 += 1;
                if (checksCount5 == mday) {
                    document.form.b4.checked = true;
                }
            }
        }

        if (mday*4+1 <= i && i <= mday*5) {
            if (checks == false) {
                document.form.b5.checked = false;
            }
            else {
                checksCount6 += 1;
                if (checksCount6 == mday) {
                    document.form.b5.checked = true;
                }
            }
        }

        if (mday*5+1 <= i && i <= mday*6) {
            if (checks == false) {
                document.form.b6.checked = false;
            }
            else {
                checksCount7 += 1;
                if (checksCount7 == mday) {
                    document.form.b6.checked = true;
                }
            }
        }

        if (mday*6+1 <= i && i <= mday*7) {
            if (checks == false) {
                document.form.b7.checked = false;
            }
            else {
                checksCount8 += 1;
                if (checksCount8 == mday) {
                    document.form.b7.checked = true;
                }
            }
        }

        if (mday*7+1 <= i && i <= mday*8) {
            if (checks == false) {
                document.form.b8.checked = false;
            }
            else {
                checksCount9 += 1;
                if (checksCount9 == mday) {
                    document.form.b8.checked = true;
                }
            }
        }

        if (mday*8+1 <= i && i <= mday*9) {
            if (checks == false) {
                document.form.b9.checked = false;
            }
            else {
                checksCount10 += 1;
                if (checksCount10 == mday) {
                    document.form.b9.checked = true;
                }
            }
        }

        if (mday*9+1 <= i && i <= mday*10) {
            if (checks == false) {
                document.form.b10.checked = false;
            }
            else {
                checksCount11 += 1;
                if (checksCount11 == mday) {
                    document.form.b10.checked = true;
                }
            }
        }

        if (mday*10+1 <= i && i <= mday*11) {
            if (checks == false) {
                document.form.b11.checked = false;
            }
            else {
                checksCount12 += 1;
                if (checksCount12 == mday) {
                    document.form.b11.checked = true;
                }
            }
        }

        if (mday*11+1 <= i && i <= mday*12) {
            if (checks == false) {
                document.form.b12.checked = false;
            }
            else {
                checksCount13 += 1;
                if (checksCount13 == mday) {
                    document.form.b12.checked = true;
                }
            }
        }
    }

    for (var j = 1; j <= mday; j++) {
        var checksCount = 0;
        for (var i = 0; i < 12; i++) {
            var k = i * mday + j;
            var checks = document.form.elements[`b[${k}]`].checked;
            if (checks == false) {
                document.form.elements[`bd${j}`].checked = false;
            }
            else {
                checksCount += 1;
                if (checksCount == 12) {
                    document.form.elements[`bd${j}`].checked = true;
                }
            }
        }
    }
}

function B1Checked() {
    var b1 = document.form.b1.checked;
    for (var i = 1; i <= mday; i++) {
        document.form.elements[`b[${i}]`].checked = b1;
    }
}

function B2Checked() {
    var b2 = document.form.b2.checked;
    for (var i = mday+1; i <= mday*2; i++) {
        document.form.elements[`b[${i}]`].checked = b2;
    }
}

function B3Checked() {
    var b3 = document.form.b3.checked;
    for (var i = mday*2+1; i <= mday*3; i++) {
        document.form.elements[`b[${i}]`].checked = b3;
    }
}

function B4Checked() {
    var b4 = document.form.b4.checked;
    for (var i = mday*3+1; i <= mday*4; i++) {
        document.form.elements[`b[${i}]`].checked = b4;
    }
}

function B5Checked() {
    var b5 = document.form.b5.checked;
    for (var i = mday*4+1; i <= mday*5; i++) {
        document.form.elements[`b[${i}]`].checked = b5;
    }
}

function B6Checked() {
    var b6 = document.form.b6.checked;
    for (var i = mday*5+1; i <= mday*6; i++) {
        document.form.elements[`b[${i}]`].checked = b6;
    }
}

function B7Checked() {
    var b7 = document.form.b7.checked;
    for (var i = mday*6+1; i <= mday*7; i++) {
        document.form.elements[`b[${i}]`].checked = b7;
    }
}

function B8Checked() {
    var b8 = document.form.b8.checked;
    for (var i = mday*7+1; i <= mday*8; i++) {
        document.form.elements[`b[${i}]`].checked = b8;
    }
}

function B9Checked() {
    var b9 = document.form.b9.checked;
    for (var i = mday*8+1; i <= mday*9; i++) {
        document.form.elements[`b[${i}]`].checked = b9;
    }
}

function B10Checked() {
    var b10 = document.form.b10.checked;
    for (var i = mday*9+1; i <= mday*10; i++) {
        document.form.elements[`b[${i}]`].checked = b10;
    }
}

function B11Checked() {
    var b11 = document.form.b11.checked;
    for (var i = mday*10+1; i <= mday*11; i++) {
        document.form.elements[`b[${i}]`].checked = b11;
    }
}

function B12Checked() {
    var b12 = document.form.b12.checked;
    for (var i = mday*11+1; i <= mday*12; i++) {
        document.form.elements[`b[${i}]`].checked = b12;
    }
}

function Bd1Checked() {
    var bd1 = document.form.bd1.checked;
    for (var i = 0; i < 12; i++) {
        var j = i * mday + 1;
        document.form.elements[`b[${j}]`].checked = bd1;
    }
}

function Bd2Checked() {
    var bd2 = document.form.bd2.checked;
    for (var i = 0; i < 12; i++) {
        var j = i * mday + 2;
        document.form.elements[`b[${j}]`].checked = bd2;
    }
}

function Bd3Checked() {
    var bd3 = document.form.bd3.checked;
    for (var i = 0; i < 12; i++) {
        var j = i * mday + 3;
        document.form.elements[`b[${j}]`].checked = bd3;
    }
}

function Bd4Checked() {
    var bd4 = document.form.bd4.checked;
    for (var i = 0; i < 12; i++) {
        var j = i * mday + 4;
        document.form.elements[`b[${j}]`].checked = bd4;
    }
}

function Bd5Checked() {
    var bd5 = document.form.bd5.checked;
    for (var i = 0; i < 12; i++) {
        var j = i * mday + 5;
        document.form.elements[`b[${j}]`].checked = bd5;
    }
}

function Bd6Checked() {
    var bd6 = document.form.bd6.checked;
    for (var i = 0; i < 12; i++) {
        var j = i * mday + 6;
        document.form.elements[`b[${j}]`].checked = bd6;
    }
}

function Bd7Checked() {
    var bd7 = document.form.bd7.checked;
    for (var i = 0; i < 12; i++) {
        var j = i * mday + 7;
        document.form.elements[`b[${j}]`].checked = bd7;
    }
}

function Bd8Checked() {
    var bd8 = document.form.bd8.checked;
    for (var i = 0; i < 12; i++) {
        var j = i * mday + 8;
        document.form.elements[`b[${j}]`].checked = bd8;
    }
}

function Bd9Checked() {
    var bd9 = document.form.bd9.checked;
    for (var i = 0; i < 12; i++) {
        var j = i * mday + 9;
        document.form.elements[`b[${j}]`].checked = bd9;
    }
}

function Bd10Checked() {
    var bd10 = document.form.bd10.checked;
    for (var i = 0; i < 12; i++) {
        var j = i * mday + 10;
        document.form.elements[`b[${j}]`].checked = bd10;
    }
}

function Bd11Checked() {
    var bd11 = document.form.bd11.checked;
    for (var i = 0; i < 12; i++) {
        var j = i * mday + 11;
        document.form.elements[`b[${j}]`].checked = bd11;
    }
}

function Bd12Checked() {
    var bd12 = document.form.bd12.checked;
    for (var i = 0; i < 12; i++) {
        var j = i * mday + 12;
        document.form.elements[`b[${j}]`].checked = bd12;
    }
}

function Bd13Checked() {
    var bd13 = document.form.bd13.checked;
    for (var i = 0; i < 12; i++) {
        var j = i * mday + 13;
        document.form.elements[`b[${j}]`].checked = bd13;
    }
}

function Bd14Checked() {
    var bd14 = document.form.bd14.checked;
    for (var i = 0; i < 12; i++) {
        var j = i * mday + 14;
        document.form.elements[`b[${j}]`].checked = bd14;
    }
}

function Bd15Checked() {
    var bd15 = document.form.bd15.checked;
    for (var i = 0; i < 12; i++) {
        var j = i * mday + 15;
        document.form.elements[`b[${j}]`].checked = bd15;
    }
}

function Bd16Checked() {
    var bd16 = document.form.bd16.checked;
    for (var i = 0; i < 12; i++) {
        var j = i * mday + 16;
        document.form.elements[`b[${j}]`].checked = bd16;
    }
}

function Bd17Checked() {
    var bd17 = document.form.bd17.checked;
    for (var i = 0; i < 12; i++) {
        var j = i * mday + 17;
        document.form.elements[`b[${j}]`].checked = bd17;
    }
}

function Bd18Checked() {
    var bd18 = document.form.bd18.checked;
    for (var i = 0; i < 12; i++) {
        var j = i * mday + 18;
        document.form.elements[`b[${j}]`].checked = bd18;
    }
}

function Bd19Checked() {
    var bd19 = document.form.bd19.checked;
    for (var i = 0; i < 12; i++) {
        var j = i * mday + 19;
        document.form.elements[`b[${j}]`].checked = bd19;
    }
}

function Bd20Checked() {
    var bd20 = document.form.bd20.checked;
    for (var i = 0; i < 12; i++) {
        var j = i * mday + 20;
        document.form.elements[`b[${j}]`].checked = bd20;
    }
}

function Bd21Checked() {
    var bd21 = document.form.bd21.checked;
    for (var i = 0; i < 12; i++) {
        var j = i * mday + 21;
        document.form.elements[`b[${j}]`].checked = bd21;
    }
}

function Bd22Checked() {
    var bd22 = document.form.bd22.checked;
    for (var i = 0; i < 12; i++) {
        var j = i * mday + 22;
        document.form.elements[`b[${j}]`].checked = bd22;
    }
}

function Bd23Checked() {
    var bd23 = document.form.bd23.checked;
    for (var i = 0; i < 12; i++) {
        var j = i * mday + 23;
        document.form.elements[`b[${j}]`].checked = bd23;
    }
}

function Bd24Checked() {
    var bd24 = document.form.bd24.checked;
    for (var i = 0; i < 12; i++) {
        var j = i * mday + 24;
        document.form.elements[`b[${j}]`].checked = bd24;
    }
}

function Bd25Checked() {
    var bd25 = document.form.bd25.checked;
    for (var i = 0; i < 12; i++) {
        var j = i * mday + 25;
        document.form.elements[`b[${j}]`].checked = bd25;
    }
}

function Bd26Checked() {
    var bd26 = document.form.bd26.checked;
    for (var i = 0; i < 12; i++) {
        var j = i * mday + 26;
        document.form.elements[`b[${j}]`].checked = bd26;
    }
}

function Bd27Checked() {
    var bd27 = document.form.bd27.checked;
    for (var i = 0; i < 12; i++) {
        var j = i * mday + 27;
        document.form.elements[`b[${j}]`].checked = bd27;
    }
}

function Bd28Checked() {
    var bd28 = document.form.bd28.checked;
    for (var i = 0; i < 12; i++) {
        var j = i * mday + 28;
        document.form.elements[`b[${j}]`].checked = bd28;
    }
}

function Bd29Checked() {
    var bd29 = document.form.bd29.checked;
    for (var i = 0; i < 12; i++) {
        var j = i * mday + 29;
        document.form.elements[`b[${j}]`].checked = bd29;
    }
}

function Bd30Checked() {
    var bd30 = document.form.bd30.checked;
    for (var i = 0; i < 12; i++) {
        var j = i * mday + 30;
        document.form.elements[`b[${j}]`].checked = bd30;
    }
}

function AllCheckedC() {
    var all = document.form.allc.checked;
    for (var i = 1; i <= mday*12; i++) {
        document.form.elements[`c[${i}]`].checked = all;
    }

    for (var i = 1; i <= 12; i++) {
        document.form.elements[`c${i}`].checked = all;
    }

    for (var i = 1; i <= mday; i++) {
        document.form.elements[`cd${i}`].checked = all;
    }
}

function DisCheckedC() {
    var checksCount1 = 0;
    var checksCount2 = 0;
    var checksCount3 = 0;
    var checksCount4 = 0;
    var checksCount5 = 0;
    var checksCount6 = 0;
    var checksCount7 = 0;
    var checksCount8 = 0;
    var checksCount9 = 0;
    var checksCount10 = 0;
    var checksCount11 = 0;
    var checksCount12 = 0;
    var checksCount13 = 0;
    for (var i = 1; i <= mday*12; i++) {
        var checks = document.form.elements[`c[${i}]`].checked;
        if (checks == false) {
            document.form.allc.checked = false;
        }
        else {
            checksCount1 += 1;
            if (checksCount1 == mday*12) {
                document.form.allc.checked = true;
            }
        }

        if (i <= mday) {
            if (checks == false) {
                document.form.c1.checked = false;
            }
            else {
                checksCount2 += 1;
                if (checksCount2 == mday) {
                    document.form.c1.checked = true;
                }
            }
        }

        if (mday+1 <= i && i <= mday*2) {
            if (checks == false) {
                document.form.c2.checked = false;
            }
            else {
                checksCount3 += 1;
                if (checksCount3 == mday) {
                    document.form.c2.checked = true;
                }
            }
        }

        if (mday*2+1 <= i && i <= mday*3) {
            if (checks == false) {
                document.form.c3.checked = false;
            }
            else {
                checksCount4 += 1;
                if (checksCount4 == mday) {
                    document.form.c3.checked = true;
                }
            }
        }

        if (mday*3+1 <= i && i <= mday*4) {
            if (checks == false) {
                document.form.c4.checked = false;
            }
            else {
                checksCount5 += 1;
                if (checksCount5 == mday) {
                    document.form.c4.checked = true;
                }
            }
        }

        if (mday*4+1 <= i && i <= mday*5) {
            if (checks == false) {
                document.form.c5.checked = false;
            }
            else {
                checksCount6 += 1;
                if (checksCount6 == mday) {
                    document.form.c5.checked = true;
                }
            }
        }

        if (mday*5+1 <= i && i <= mday*6) {
            if (checks == false) {
                document.form.c6.checked = false;
            }
            else {
                checksCount7 += 1;
                if (checksCount7 == mday) {
                    document.form.c6.checked = true;
                }
            }
        }

        if (mday*6+1 <= i && i <= mday*7) {
            if (checks == false) {
                document.form.c7.checked = false;
            }
            else {
                checksCount8 += 1;
                if (checksCount8 == mday) {
                    document.form.c7.checked = true;
                }
            }
        }

        if (mday*7+1 <= i && i <= mday*8) {
            if (checks == false) {
                document.form.c8.checked = false;
            }
            else {
                checksCount9 += 1;
                if (checksCount9 == mday) {
                    document.form.c8.checked = true;
                }
            }
        }

        if (mday*8+1 <= i && i <= mday*9) {
            if (checks == false) {
                document.form.c9.checked = false;
            }
            else {
                checksCount10 += 1;
                if (checksCount10 == mday) {
                    document.form.c9.checked = true;
                }
            }
        }

        if (mday*9+1 <= i && i <= mday*10) {
            if (checks == false) {
                document.form.c10.checked = false;
            }
            else {
                checksCount11 += 1;
                if (checksCount11 == mday) {
                    document.form.c10.checked = true;
                }
            }
        }

        if (mday*10+1 <= i && i <= mday*11) {
            if (checks == false) {
                document.form.c11.checked = false;
            }
            else {
                checksCount12 += 1;
                if (checksCount12 == mday) {
                    document.form.c11.checked = true;
                }
            }
        }

        if (mday*11+1 <= i && i <= mday*12) {
            if (checks == false) {
                document.form.c12.checked = false;
            }
            else {
                checksCount13 += 1;
                if (checksCount13 == mday) {
                    document.form.c12.checked = true;
                }
            }
        }
    }

    for (var j = 1; j <= mday; j++) {
        var checksCount = 0;
        for (var i = 0; i < 12; i++) {
            var k = i * mday + j;
            var checks = document.form.elements[`c[${k}]`].checked;
            if (checks == false) {
                document.form.elements[`cd${j}`].checked = false;
            }
            else {
                checksCount += 1;
                if (checksCount == 12) {
                    document.form.elements[`cd${j}`].checked = true;
                }
            }
        }
    }
}

function C1Checked() {
    var c1 = document.form.c1.checked;
    for (var i = 1; i <= mday; i++) {
        document.form.elements[`c[${i}]`].checked = c1;
    }
}

function C2Checked() {
    var c2 = document.form.c2.checked;
    for (var i = mday+1; i <= mday*2; i++) {
        document.form.elements[`c[${i}]`].checked = c2;
    }
}

function C3Checked() {
    var c3 = document.form.c3.checked;
    for (var i = mday*2+1; i <= mday*3; i++) {
        document.form.elements[`c[${i}]`].checked = c3;
    }
}

function C4Checked() {
    var c4 = document.form.c4.checked;
    for (var i = mday*3+1; i <= mday*4; i++) {
        document.form.elements[`c[${i}]`].checked = c4;
    }
}

function C5Checked() {
    var c5 = document.form.c5.checked;
    for (var i = mday*4+1; i <= mday*5; i++) {
        document.form.elements[`c[${i}]`].checked = c5;
    }
}

function C6Checked() {
    var c6 = document.form.c6.checked;
    for (var i = mday*5+1; i <= mday*6; i++) {
        document.form.elements[`c[${i}]`].checked = c6;
    }
}

function C7Checked() {
    var c7 = document.form.c7.checked;
    for (var i = mday*6; i <= mday*7; i++) {
        document.form.elements[`c[${i}]`].checked = c7;
    }
}

function C8Checked() {
    var c8 = document.form.c8.checked;
    for (var i = mday*7+1; i <= mday*8; i++) {
        document.form.elements[`c[${i}]`].checked = c8;
    }
}

function C9Checked() {
    var c9 = document.form.c9.checked;
    for (var i = mday*8+1; i <= mday*9; i++) {
        document.form.elements[`c[${i}]`].checked = c9;
    }
}

function C10Checked() {
    var c10 = document.form.c10.checked;
    for (var i = mday*9+1; i <= mday*10; i++) {
        document.form.elements[`c[${i}]`].checked = c10;
    }
}

function C11Checked() {
    var c11 = document.form.c11.checked;
    for (var i = mday*10+1; i <= mday*11; i++) {
        document.form.elements[`c[${i}]`].checked = c11;
    }
}

function C12Checked() {
    var c12 = document.form.c12.checked;
    for (var i = mday*11+1; i <= mday*12; i++) {
        document.form.elements[`c[${i}]`].checked = c12;
    }
}

function Cd1Checked() {
    var cd1 = document.form.cd1.checked;
    for (var i = 0; i < 12; i++) {
        var j = i * mday + 1;
        document.form.elements[`c[${j}]`].checked = cd1;
    }
}

function Cd2Checked() {
    var cd2 = document.form.cd2.checked;
    for (var i = 0; i < 12; i++) {
        var j = i * mday + 2;
        document.form.elements[`c[${j}]`].checked = cd2;
    }
}

function Cd3Checked() {
    var cd3 = document.form.cd3.checked;
    for (var i = 0; i < 12; i++) {
        var j = i * mday + 3;
        document.form.elements[`c[${j}]`].checked = cd3;
    }
}

function Cd4Checked() {
    var cd4 = document.form.cd4.checked;
    for (var i = 0; i < 12; i++) {
        var j = i * mday + 4;
        document.form.elements[`c[${j}]`].checked = cd4;
    }
}

function Cd5Checked() {
    var cd5 = document.form.cd5.checked;
    for (var i = 0; i < 12; i++) {
        var j = i * mday + 5;
        document.form.elements[`c[${j}]`].checked = cd5;
    }
}

function Cd6Checked() {
    var cd6 = document.form.cd6.checked;
    for (var i = 0; i < 12; i++) {
        var j = i * mday + 6;
        document.form.elements[`c[${j}]`].checked = cd6;
    }
}

function Cd7Checked() {
    var cd7 = document.form.cd7.checked;
    for (var i = 0; i < 12; i++) {
        var j = i * mday + 7;
        document.form.elements[`c[${j}]`].checked = cd7;
    }
}

function Cd8Checked() {
    var cd8 = document.form.cd8.checked;
    for (var i = 0; i < 12; i++) {
        var j = i * mday + 8;
        document.form.elements[`c[${j}]`].checked = cd8;
    }
}

function Cd9Checked() {
    var cd9 = document.form.cd9.checked;
    for (var i = 0; i < 12; i++) {
        var j = i * mday + 9;
        document.form.elements[`c[${j}]`].checked = cd9;
    }
}

function Cd10Checked() {
    var cd10 = document.form.cd10.checked;
    for (var i = 0; i < 12; i++) {
        var j = i * mday + 10;
        document.form.elements[`c[${j}]`].checked = cd10;
    }
}

function Cd11Checked() {
    var cd11 = document.form.cd11.checked;
    for (var i = 0; i < 12; i++) {
        var j = i * mday + 11;
        document.form.elements[`c[${j}]`].checked = cd11;
    }
}

function Cd12Checked() {
    var cd12 = document.form.cd12.checked;
    for (var i = 0; i < 12; i++) {
        var j = i * mday + 12;
        document.form.elements[`c[${j}]`].checked = cd12;
    }
}

function Cd13Checked() {
    var cd13 = document.form.cd13.checked;
    for (var i = 0; i < 12; i++) {
        var j = i * mday + 13;
        document.form.elements[`c[${j}]`].checked = cd13;
    }
}

function Cd14Checked() {
    var cd14 = document.form.cd14.checked;
    for (var i = 0; i < 12; i++) {
        var j = i * mday + 14;
        document.form.elements[`c[${j}]`].checked = cd14;
    }
}

function Cd15Checked() {
    var cd15 = document.form.cd15.checked;
    for (var i = 0; i < 12; i++) {
        var j = i * mday + 15;
        document.form.elements[`c[${j}]`].checked = cd15;
    }
}

function Cd16Checked() {
    var cd16 = document.form.cd16.checked;
    for (var i = 0; i < 12; i++) {
        var j = i * mday + 16;
        document.form.elements[`c[${j}]`].checked = cd16;
    }
}

function Cd17Checked() {
    var cd17 = document.form.cd17.checked;
    for (var i = 0; i < 12; i++) {
        var j = i * mday + 17;
        document.form.elements[`c[${j}]`].checked = cd17;
    }
}

function Cd18Checked() {
    var cd18 = document.form.cd18.checked;
    for (var i = 0; i < 12; i++) {
        var j = i * mday + 18;
        document.form.elements[`c[${j}]`].checked = cd18;
    }
}

function Cd19Checked() {
    var cd19 = document.form.cd19.checked;
    for (var i = 0; i < 12; i++) {
        var j = i * mday + 19;
        document.form.elements[`c[${j}]`].checked = cd19;
    }
}

function Cd20Checked() {
    var cd20 = document.form.cd20.checked;
    for (var i = 0; i < 12; i++) {
        var j = i * mday + 20;
        document.form.elements[`c[${j}]`].checked = cd20;
    }
}

function Cd21Checked() {
    var cd21 = document.form.cd21.checked;
    for (var i = 0; i < 12; i++) {
        var j = i * mday + 21;
        document.form.elements[`c[${j}]`].checked = cd21;
    }
}

function Cd22Checked() {
    var cd22 = document.form.cd22.checked;
    for (var i = 0; i < 12; i++) {
        var j = i * mday + 22;
        document.form.elements[`c[${j}]`].checked = cd22;
    }
}

function Cd23Checked() {
    var cd23 = document.form.cd23.checked;
    for (var i = 0; i < 12; i++) {
        var j = i * mday + 23;
        document.form.elements[`c[${j}]`].checked = cd23;
    }
}

function Cd24Checked() {
    var cd24 = document.form.cd24.checked;
    for (var i = 0; i < 12; i++) {
        var j = i * mday + 24;
        document.form.elements[`c[${j}]`].checked = cd24;
    }
}

function Cd25Checked() {
    var cd25 = document.form.cd25.checked;
    for (var i = 0; i < 12; i++) {
        var j = i * mday + 25;
        document.form.elements[`c[${j}]`].checked = cd25;
    }
}

function Cd26Checked() {
    var cd26 = document.form.cd26.checked;
    for (var i = 0; i < 12; i++) {
        var j = i * mday + 26;
        document.form.elements[`c[${j}]`].checked = cd26;
    }
}

function Cd27Checked() {
    var cd27 = document.form.cd27.checked;
    for (var i = 0; i < 12; i++) {
        var j = i * mday + 27;
        document.form.elements[`c[${j}]`].checked = cd27;
    }
}

function Cd28Checked() {
    var cd28 = document.form.cd28.checked;
    for (var i = 0; i < 12; i++) {
        var j = i * mday + 28;
        document.form.elements[`c[${j}]`].checked = cd28;
    }
}

function Cd29Checked() {
    var cd29 = document.form.cd29.checked;
    for (var i = 0; i < 12; i++) {
        var j = i * mday + 29;
        document.form.elements[`c[${j}]`].checked = cd29;
    }
}

function Cd30Checked() {
    var cd30 = document.form.cd30.checked;
    for (var i = 0; i < 12; i++) {
        var j = i * mday + 30;
        document.form.elements[`c[${j}]`].checked = cd30;
    }
}

function AllCheckedD() {
    var all = document.form.alld.checked;
    for (var i = 1; i <= mday*12; i++) {
        document.form.elements[`d[${i}]`].checked = all;
    }

    for (var i = 1; i <= 12; i++) {
        document.form.elements[`d${i}`].checked = all;
    }

    for (var i = 1; i <= mday; i++) {
        document.form.elements[`dd${i}`].checked = all;
    }
}

function DisCheckedD() {
    var checksCount1 = 0;
    var checksCount2 = 0;
    var checksCount3 = 0;
    var checksCount4 = 0;
    var checksCount5 = 0;
    var checksCount6 = 0;
    var checksCount7 = 0;
    var checksCount8 = 0;
    var checksCount9 = 0;
    var checksCount10 = 0;
    var checksCount11 = 0;
    var checksCount12 = 0;
    var checksCount13 = 0;
    for (var i = 1; i <= mday*12; i++) {
        var checks = document.form.elements[`d[${i}]`].checked;
        if (checks == false) {
            document.form.alld.checked = false;
        }
        else {
            checksCount1 += 1;
            if (checksCount1 == mday*12) {
                document.form.alld.checked = true;
            }
        }

        if (i <= mday) {
            if (checks == false) {
                document.form.d1.checked = false;
            }
            else {
                checksCount2 += 1;
                if (checksCount2 == mday) {
                    document.form.d1.checked = true;
                }
            }
        }

        if (mday+1 <= i && i <= mday*2) {
            if (checks == false) {
                document.form.d2.checked = false;
            }
            else {
                checksCount3 += 1;
                if (checksCount3 == mday) {
                    document.form.d2.checked = true;
                }
            }
        }

        if (mday*2+1 <= i && i <= mday*3) {
            if (checks == false) {
                document.form.d3.checked = false;
            }
            else {
                checksCount4 += 1;
                if (checksCount4 == mday) {
                    document.form.d3.checked = true;
                }
            }
        }

        if (mday*3+1 <= i && i <= mday*4) {
            if (checks == false) {
                document.form.d4.checked = false;
            }
            else {
                checksCount5 += 1;
                if (checksCount5 == mday) {
                    document.form.d4.checked = true;
                }
            }
        }

        if (mday*4+1 <= i && i <= mday*5) {
            if (checks == false) {
                document.form.d5.checked = false;
            }
            else {
                checksCount6 += 1;
                if (checksCount6 == mday) {
                    document.form.d5.checked = true;
                }
            }
        }

        if (mday*5+1 <= i && i <= mday*6) {
            if (checks == false) {
                document.form.d6.checked = false;
            }
            else {
                checksCount7 += 1;
                if (checksCount7 == mday) {
                    document.form.d6.checked = true;
                }
            }
        }

        if (mday*6+1 <= i && i <= mday*7) {
            if (checks == false) {
                document.form.d7.checked = false;
            }
            else {
                checksCount8 += 1;
                if (checksCount8 == mday) {
                    document.form.d7.checked = true;
                }
            }
        }

        if (mday*7+1 <= i && i <= mday*8) {
            if (checks == false) {
                document.form.d8.checked = false;
            }
            else {
                checksCount9 += 1;
                if (checksCount9 == mday) {
                    document.form.d8.checked = true;
                }
            }
        }

        if (mday*8+1 <= i && i <= mday*9) {
            if (checks == false) {
                document.form.d9.checked = false;
            }
            else {
                checksCount10 += 1;
                if (checksCount10 == mday) {
                    document.form.d9.checked = true;
                }
            }
        }

        if (mday*9+1 <= i && i <= mday*10) {
            if (checks == false) {
                document.form.d10.checked = false;
            }
            else {
                checksCount11 += 1;
                if (checksCount11 == mday) {
                    document.form.d10.checked = true;
                }
            }
        }

        if (mday*10+1 <= i && i <= mday*11) {
            if (checks == false) {
                document.form.d11.checked = false;
            }
            else {
                checksCount12 += 1;
                if (checksCount12 == mday) {
                    document.form.d11.checked = true;
                }
            }
        }

        if (mday*11+1 <= i && i <= mday*12) {
            if (checks == false) {
                document.form.d12.checked = false;
            }
            else {
                checksCount13 += 1;
                if (checksCount13 == mday) {
                    document.form.d12.checked = true;
                }
            }
        }
    }

    for (var j = 1; j <= mday; j++) {
        var checksCount = 0;
        for (var i = 0; i < 12; i++) {
            var k = i * mday + j;
            var checks = document.form.elements[`d[${k}]`].checked;
            if (checks == false) {
                document.form.elements[`dd${j}`].checked = false;
            }
            else {
                checksCount += 1;
                if (checksCount == 12) {
                    document.form.elements[`dd${j}`].checked = true;
                }
            }
        }
    }
}

function D1Checked() {
    var d1 = document.form.d1.checked;
    for (var i = 1; i <= mday; i++) {
        document.form.elements[`d[${i}]`].checked = d1;
    }
}

function D2Checked() {
    var d2 = document.form.d2.checked;
    for (var i = mday+1; i <= mday*2; i++) {
        document.form.elements[`d[${i}]`].checked = d2;
    }
}

function D3Checked() {
    var d3 = document.form.d3.checked;
    for (var i = mday*2+1; i <= mday*3; i++) {
        document.form.elements[`d[${i}]`].checked = d3;
    }
}

function D4Checked() {
    var d4 = document.form.d4.checked;
    for (var i = mday*3+1; i <= mday*4; i++) {
        document.form.elements[`d[${i}]`].checked = d4;
    }
}

function D5Checked() {
    var d5 = document.form.d5.checked;
    for (var i = mday*4+1; i <= mday*5; i++) {
        document.form.elements[`d[${i}]`].checked = d5;
    }
}

function D6Checked() {
    var d6 = document.form.d6.checked;
    for (var i = mday*5+1; i <= mday*6; i++) {
        document.form.elements[`d[${i}]`].checked = d6;
    }
}

function D7Checked() {
    var d7 = document.form.d7.checked;
    for (var i = mday*6+1; i <= mday*7; i++) {
        document.form.elements[`d[${i}]`].checked = d7;
    }
}

function D8Checked() {
    var d8 = document.form.d8.checked;
    for (var i = mday*7+1; i <= mday*8; i++) {
        document.form.elements[`d[${i}]`].checked = d8;
    }
}

function D9Checked() {
    var d9 = document.form.d9.checked;
    for (var i = mday*8+1; i <= mday*9; i++) {
        document.form.elements[`d[${i}]`].checked = d9;
    }
}

function D10Checked() {
    var d10 = document.form.d10.checked;
    for (var i = mday*9+1; i <= mday*10; i++) {
        document.form.elements[`d[${i}]`].checked = d10;
    }
}

function D11Checked() {
    var d11 = document.form.d11.checked;
    for (var i = mday*10+1; i <= mday*11; i++) {
        document.form.elements[`d[${i}]`].checked = d11;
    }
}

function D12Checked() {
    var d12 = document.form.d12.checked;
    for (var i = mday*11+1; i <= mday*12; i++) {
        document.form.elements[`d[${i}]`].checked = d12;
    }
}

function Dd1Checked() {
    var dd1 = document.form.dd1.checked;
    for (var i = 0; i < 12; i++) {
        var j = i * mday + 1;
        document.form.elements[`d[${j}]`].checked = dd1;
    }
}

function Dd2Checked() {
    var dd2 = document.form.dd2.checked;
    for (var i = 0; i < 12; i++) {
        var j = i * mday + 2;
        document.form.elements[`d[${j}]`].checked = dd2;
    }
}

function Dd3Checked() {
    var dd3 = document.form.dd3.checked;
    for (var i = 0; i < 12; i++) {
        var j = i * mday + 3;
        document.form.elements[`d[${j}]`].checked = dd3;
    }
}

function Dd4Checked() {
    var dd4 = document.form.dd4.checked;
    for (var i = 0; i < 12; i++) {
        var j = i * mday + 4;
        document.form.elements[`d[${j}]`].checked = dd4;
    }
}

function Dd5Checked() {
    var dd5 = document.form.dd5.checked;
    for (var i = 0; i < 12; i++) {
        var j = i * mday + 5;
        document.form.elements[`d[${j}]`].checked = dd5;
    }
}

function Dd6Checked() {
    var dd6 = document.form.dd6.checked;
    for (var i = 0; i < 12; i++) {
        var j = i * mday + 6;
        document.form.elements[`d[${j}]`].checked = dd6;
    }
}

function Dd7Checked() {
    var dd7 = document.form.dd7.checked;
    for (var i = 0; i < 12; i++) {
        var j = i * mday + 7;
        document.form.elements[`d[${j}]`].checked = dd7;
    }
}

function Dd8Checked() {
    var dd8 = document.form.dd8.checked;
    for (var i = 0; i < 12; i++) {
        var j = i * mday + 8;
        document.form.elements[`d[${j}]`].checked = dd8;
    }
}

function Dd9Checked() {
    var dd9 = document.form.dd9.checked;
    for (var i = 0; i < 12; i++) {
        var j = i * mday + 9;
        document.form.elements[`d[${j}]`].checked = dd9;
    }
}

function Dd10Checked() {
    var dd10 = document.form.dd10.checked;
    for (var i = 0; i < 12; i++) {
        var j = i * mday + 10;
        document.form.elements[`d[${j}]`].checked = dd10;
    }
}

function Dd11Checked() {
    var dd11 = document.form.dd11.checked;
    for (var i = 0; i < 12; i++) {
        var j = i * mday + 11;
        document.form.elements[`d[${j}]`].checked = dd11;
    }
}

function Dd12Checked() {
    var dd12 = document.form.dd12.checked;
    for (var i = 0; i < 12; i++) {
        var j = i * mday + 12;
        document.form.elements[`d[${j}]`].checked = dd12;
    }
}

function Dd13Checked() {
    var dd13 = document.form.dd13.checked;
    for (var i = 0; i < 12; i++) {
        var j = i * mday + 13;
        document.form.elements[`d[${j}]`].checked = dd13;
    }
}

function Dd14Checked() {
    var dd14 = document.form.dd14.checked;
    for (var i = 0; i < 12; i++) {
        var j = i * mday + 14;
        document.form.elements[`d[${j}]`].checked = dd14;
    }
}

function Dd15Checked() {
    var dd15 = document.form.dd15.checked;
    for (var i = 0; i < 12; i++) {
        var j = i * mday + 15;
        document.form.elements[`d[${j}]`].checked = dd15;
    }
}

function Dd16Checked() {
    var dd16 = document.form.dd16.checked;
    for (var i = 0; i < 12; i++) {
        var j = i * mday + 16;
        document.form.elements[`d[${j}]`].checked = dd16;
    }
}

function Dd17Checked() {
    var dd17 = document.form.dd17.checked;
    for (var i = 0; i < 12; i++) {
        var j = i * mday + 17;
        document.form.elements[`d[${j}]`].checked = dd17;
    }
}

function Dd18Checked() {
    var dd18 = document.form.dd18.checked;
    for (var i = 0; i < 12; i++) {
        var j = i * mday + 18;
        document.form.elements[`d[${j}]`].checked = dd18;
    }
}

function Dd19Checked() {
    var dd19 = document.form.dd19.checked;
    for (var i = 0; i < 12; i++) {
        var j = i * mday + 19;
        document.form.elements[`d[${j}]`].checked = dd19;
    }
}

function Dd20Checked() {
    var dd20 = document.form.dd20.checked;
    for (var i = 0; i < 12; i++) {
        var j = i * mday + 20;
        document.form.elements[`d[${j}]`].checked = dd20;
    }
}

function Dd21Checked() {
    var dd21 = document.form.dd21.checked;
    for (var i = 0; i < 12; i++) {
        var j = i * mday + 21;
        document.form.elements[`d[${j}]`].checked = dd21;
    }
}

function Dd22Checked() {
    var dd22 = document.form.dd22.checked;
    for (var i = 0; i < 12; i++) {
        var j = i * mday + 22;
        document.form.elements[`d[${j}]`].checked = dd22;
    }
}

function Dd23Checked() {
    var dd23 = document.form.dd23.checked;
    for (var i = 0; i < 12; i++) {
        var j = i * mday + 23;
        document.form.elements[`d[${j}]`].checked = dd23;
    }
}

function Dd24Checked() {
    var dd24 = document.form.dd24.checked;
    for (var i = 0; i < 12; i++) {
        var j = i * mday + 24;
        document.form.elements[`d[${j}]`].checked = dd24;
    }
}

function Dd25Checked() {
    var dd25 = document.form.dd25.checked;
    for (var i = 0; i < 12; i++) {
        var j = i * mday + 25;
        document.form.elements[`d[${j}]`].checked = dd25;
    }
}

function Dd26Checked() {
    var dd26 = document.form.dd26.checked;
    for (var i = 0; i < 12; i++) {
        var j = i * mday + 26;
        document.form.elements[`d[${j}]`].checked = dd26;
    }
}

function Dd27Checked() {
    var dd27 = document.form.dd27.checked;
    for (var i = 0; i < 12; i++) {
        var j = i * mday + 27;
        document.form.elements[`d[${j}]`].checked = dd27;
    }
}

function Dd28Checked() {
    var dd28 = document.form.dd28.checked;
    for (var i = 0; i < 12; i++) {
        var j = i * mday + 28;
        document.form.elements[`d[${j}]`].checked = dd28;
    }
}

function Dd29Checked() {
    var dd29 = document.form.dd29.checked;
    for (var i = 0; i < 12; i++) {
        var j = i * mday + 29;
        document.form.elements[`d[${j}]`].checked = dd29;
    }
}

function Dd30Checked() {
    var dd30 = document.form.dd30.checked;
    for (var i = 0; i < 12; i++) {
        var j = i * mday + 30;
        document.form.elements[`d[${j}]`].checked = dd30;
    }
}