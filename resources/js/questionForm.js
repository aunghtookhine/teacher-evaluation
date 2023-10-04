const questionFormTag = document.querySelector(".questionForm");

const evaluationRowOneTag = document.querySelector(".evaluationRow-1");
const evaluationRowTwoTag = document.querySelector(".evaluationRow-2");
const evaluationRowThreeTag = document.querySelector(".evaluationRow-3");
const evaluationRowFourTag = document.querySelector(".evaluationRow-4");
const evaluationRowFiveTag = document.querySelector(".evaluationRow-5");
const evaluationRowSixTag = document.querySelector(".evaluationRow-6");

const evaluationTableTag = document.querySelector(".evaluationTable");
const evaluationBtnTag = document.querySelector(".evaluationBtn");
const submitBtn = document.querySelector(".submitBtn");

const clicked = () => {
    evaluationBtnTag.classList.add("disabled");
    evaluationTableTag.classList.add("disabled");
    evaluationTableTag.classList.remove("table-hover");
    questionFormTag.classList.remove("bottom-100");
    questionFormTag.classList.add("top-50");
    questionFormTag.classList.add("start-50");
    questionFormTag.classList.add("translate-middle");
    questionFormTag.classList.add("shadow-lg");
};

evaluationRowOneTag.addEventListener("click", () => {
    clicked();
});

evaluationRowTwoTag.addEventListener("click", () => {
    clicked();
});

evaluationRowThreeTag.addEventListener("click", () => {
    clicked();
});

evaluationRowFourTag.addEventListener("click", () => {
    clicked();
});

evaluationRowFiveTag.addEventListener("click", () => {
    clicked();
});

evaluationRowSixTag.addEventListener("click", () => {
    clicked();
});
