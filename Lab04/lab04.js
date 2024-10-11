
function displayBookmarks() {
    const bookmarks = [
        "http://youtube.com",
        "https://chess.com",
        "http://tmu.com",
        "https://x.com",
        "https://github.com",
        "http://idk.com"

    ];
    const container = document.getElementById("thebookmarks");

    bookmarks.forEach(url => {
        const bookmarkDiv = document.createElement("div");

        const padlockIcon = document.createElement("span");
        if (url.startsWith("https")) {
            padlockIcon.textContent = "✅🔐";
        } else if (url.startsWith("http")) {
            padlockIcon.textContent = "⛔🔓";
        } else {
            padlockIcon.textContent = "🤷";
        }

        const link = document.createElement("a");
        link.href = url;
        link.textContent = url;
        link.target = "_blank";
        bookmarkDiv.appendChild(padlockIcon);
        bookmarkDiv.appendChild(link);
        container.appendChild(bookmarkDiv);
    });
}


function cleanString(str) {
    return str.replace(/[^A-Za-z0-9]/g, '').toLowerCase();
}

function isPalindrome(str) {
    const cleanedInput = cleanString(str);
    const reversedInput = cleanedInput.split('').reverse().join('');
    return cleanedInput === reversedInput;
}


function checkUserPalindrome() {
    const userInput = document.getElementById("userinput").value;
    const resultDiv = document.getElementById("userPalindromeResult");

    if (userInput.length >= 1) {
        if (isPalindrome(userInput)) {
            resultDiv.textContent = `a palindrome! 👍`;
        } else {
            resultDiv.textContent = `not a palindrome. 👎`;
        }
    } else {
        resultDiv.textContent = `Please enter an input!`;
    }
}

function checkPalindromeList() {
    const testStrings = [
        "Drab as a fool, aloof as a bard.",
        "It ain't over till it's over",
        "radar",
        "When you come to a fork in the road, take it",
        "Marge lets Norah see Sharon’s telegram.",
        "kayak"
    ];
    const resultDiv = document.getElementById("palindromeResults");

    testStrings.forEach(str => {
        const result = isPalindrome(str) ? "a palindrome! 👍" : "not a palindrome. 👎";
        const resultPara = document.createElement("p");
        resultPara.textContent = `"${str}" is ${result}`;
        resultDiv.appendChild(resultPara);
    });
}


window.onload = checkPalindromeList;
