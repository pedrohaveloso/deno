// @ts-check

/**
 * @type {Map.<string, HTMLDialogElement|null>}
 */
const modalCache = new Map();

/**
 * @param {HTMLDialogElement} dialog
 * @returns {Promise<void>}
 */
async function closeModal(dialog) {
  dialog.classList.add("!animate-modal-fade-out");
  dialog.classList.add("!backdrop:animate-modal-backdrop-fade-out");

  await new Promise((resolve) => setTimeout(resolve, 400));

  dialog.classList.remove("!animate-modal-fade-out");
  dialog.classList.remove("!backdrop:animate-modal-backdrop-fade-out");

  dialog.close();
}

/**
 * @param {string} modalName
 * @returns {HTMLDialogElement|null}
 */
function createModal(modalName) {
  const template = document.querySelector(
    `template[data-hook-modal-name="${modalName}"]`
  );

  if (!(template instanceof HTMLTemplateElement)) {
    return null;
  }

  const content = template.content.cloneNode(true);
  const dialog = document.createElement("dialog");
  dialog.append(content);

  dialog.classList.add(
    "hidden",
    "bg-transparent",

    "open:flex",
    "open:flex-col",
    "open:animate-modal-fade-in",

    "backdrop:opacity-0",
    "backdrop:bg-black/75",

    "open:backdrop:opacity-100",
    "open:backdrop:animate-modal-backdrop-fade-in"
  );

  dialog.querySelectorAll("[data-hook-modal-close]")?.forEach((element) => {
    element.addEventListener("click", async () => await closeModal(dialog));
  });

  dialog.addEventListener("click", async (event) => {
    if (event.target === dialog) {
      await closeModal(dialog);
    }
  });

  document.body.append(dialog);

  return dialog;
}

/**
 * @param {HTMLElement} element
 */
export default function (element) {
  const modalName = element.getAttribute("data-hook-modal-open");

  if (modalName === null || modalName === "") {
    return;
  }

  if (modalCache.get(modalName) !== undefined) {
    element.addEventListener("click", () =>
      modalCache.get(modalName)?.showModal()
    );
  } else {
    const modal = createModal(modalName);
    modalCache.set(modalName, modal);

    element.addEventListener("click", () => modal?.showModal());
  }
}
