import Clipboard from './modules/Clipboard.js';
import DataTables from './modules/DataTables.js';
import DatePicker from './modules/DatePicker.js';
import DeleteButton from './modules/DeleteButton.js';
import Filtro from './modules/Filtro.js';
import GeneratorFields from './modules/GeneratorFields.js';
import ImagesUpload from './modules/ImagesUpload.js';
import MonthPicker from './modules/MonthPicker.js';
import MultiSelect from './modules/MultiSelect.js';
import OrderImages from './modules/OrderImages.js';
import OrderTable from './modules/OrderTable.js';
import TextEditor from './modules/TextEditor.js';

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

Clipboard();
DataTables();
DatePicker();
DeleteButton();
Filtro();
GeneratorFields();
ImagesUpload();
MonthPicker();
MultiSelect();
OrderImages();
OrderTable();
TextEditor();
