var $slogan = document.getElementById("slogan"); // Setting an array with several strings.

var sloganArray = [
    "When the waves of death compassed me, the floods of ungodly men made me afraid; The sorrows of hell compassed me about; the snares of death prevented me; In my distress I called upon the LORD, and cried to my God: and he did hear my voice out of his temple, and my cry did enter into his ears. <p><span style='font-style:italic; color:red; font-weight:bold'> ~2 Samuel 22:5-7~ </span> </p> ",
    "A false balance is abomination to the LORD: but a just weight is his delight. The integrity of the upright shall guide them: but the perverseness of transgressors shall destroy them. <p> <span style='font-style:italic; color:red; font-weight:bold'>  ~Proverbs 11:1-3~ </span> </p> ",
    "And out of them shall proceed thanksgiving and the voice of them that make merry: and I will multiply them, and they shall not be few; I will also glorify them, and they shall not be small.  <p><span style='font-style:italic; color:red; font-weight:bold'>  ~Jeremiah 30:19~</span> </p> ",
    "Have not I commanded thee? Be strong and of a good courage; be not afraid, neither be thou dismayed: for the LORD thy God is with thee whithersoever thou goest. <p><span style='font-style:italic; color:red; font-weight:bold'>  ~Joshua 1:9~ </span> </p> ",
    "Shew me thy ways, O LORD; teach me thy paths. Lead me in thy truth, and teach me: for thou art the God of my salvation; on thee do I wait all the day. <p><span style='font-style:italic; color:red; font-weight:bold'>  ~Psalms 25:4-5~ </span></p>  ",
]; //Setting variable to control the index.

var sloganIndex = 0;
/* This function (only when called) replaces the text of the element called before with text contained on the strings of the array, each time incrementing one and going through every array position. */

function changeSlogan() {
    $slogan.innerHTML = sloganArray[sloganIndex];
    ++sloganIndex;

    if (sloganIndex >= sloganArray.length) {
        sloganIndex = 0;
    }
} //Calling the function created before every five seconds.

setInterval(changeSlogan, 4000);
