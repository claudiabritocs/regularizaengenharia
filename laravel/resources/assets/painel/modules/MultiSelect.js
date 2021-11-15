export default function MultiSelect() {
    $('.multi-select').multiselect({
        nonSelectedText: 'Selecione',
        allSelectedText: 'Todos',
        nSelectedText: ' selecionados',
        numberDisplayed: 4,
        buttonWidth: '100%'
    });
};
