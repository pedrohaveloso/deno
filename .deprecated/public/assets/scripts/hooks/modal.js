// @ts-check

/**
 * @param {HTMLElement} element
 */
export default function (element) {
  const modalName = element.getAttribute("data-modal-open");

  if (modalName === null || modalName === "") {
    return;
  }

  element.addEventListener("click", () => {
    if (modalCache.get(modalName) !== undefined) {
      modalCache.get(modalName)?.showModal();
    } else {
      const modal = createModal(modalName);
      modalCache.set(modalName, modal);
      modal?.showModal();
    }
  });
}

/**
 * @type {Map.<string, HTMLDialogElement|null>}
 */
const modalCache = new Map();

/**
 * @param {HTMLDialogElement} dialog
 * @returns {Promise<void>}
 */
async function closeModal(dialog) {
  dialog.classList.add(
    "!animate-modal-fade-out",
    "!backdrop:animate-modal-backdrop-fade-out"
  );

  return new Promise((resolve) => {
    /**
     * @param {AnimationEvent} event
     */
    function onAnimationEnd(event) {
      if (event.animationName === "modal-fade-out") {
        dialog.classList.remove(
          "!animate-modal-fade-out",
          "!backdrop:animate-modal-backdrop-fade-out"
        );
        dialog.close();
        dialog.removeEventListener("animationend", onAnimationEnd);
        resolve();
      }
    }

    dialog.addEventListener("animationend", onAnimationEnd);
  });
}

const dialogStyle = [
  "hidden",
  "place-items-center",
  "bg-white",
  "gap-4",
  "text-center",

  "open:grid",
  "open:p-8",
  "open:rounded-2xl",
  "open:animate-modal-fade-in",

  "backdrop:opacity-0",
  "backdrop:bg-black/[0.9]",

  "open:backdrop:opacity-100",
  "open:backdrop:animate-modal-backdrop-fade-in",
];

/**
 * @param {string} modalName
 * @returns {HTMLDialogElement|null}
 */
function createModal(modalName) {
  const template = document.querySelector(
    `template[data-modal-name="${modalName}"]`
  );

  if (!(template instanceof HTMLTemplateElement)) {
    return null;
  }

  const content = template.content.cloneNode(true);

  const dialog = document.createElement("dialog");

  dialog.append(content);

  dialog.classList.add(...dialogStyle);

  dialog.querySelectorAll("[data-modal-close]")?.forEach((element) => {
    element.addEventListener("click", () => closeModal(dialog));
  });

  dialog.addEventListener("click", (event) => {
    if (event.target === dialog) {
      closeModal(dialog);
    }
  });

  document.body.append(dialog);

  return dialog;
}
