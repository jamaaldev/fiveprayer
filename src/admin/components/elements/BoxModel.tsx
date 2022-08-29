
import { useRef } from '@wordpress/element/build-types';
import * as React from 'react';
import './css/FPBOXModel.scss'
export interface IBoxModelProps {
    showPopup: string;
    SetShow: React.Dispatch<React.SetStateAction<boolean>>;
}

export function BoxModel(props: IBoxModelProps) {
    const [filename, SetfileName] = React.useState<string>('');
    const refs = React.useRef<HTMLDivElement>() as React.MutableRefObject<HTMLDivElement>;
    const FileUpload = (file) => {
        console.log("🚀 ~ file: BoxModel.tsx ~ line 13 ~ FileUpload ~ file", file.target.files[0])

        SetfileName(file.target.files[0].name)
        ConvertCSVToJSON(file.target.files[0])
    }
    const ConvertCSVToJSON = (csv) => {
        // reading csv file
        const reader = new FileReader();
        reader.readAsText(csv);
        reader.onload = () => { 
            const text = reader.result;
            let lines = [];
            const linesArray = text?.split('\n');
            // for trimming and deleting extra space 
            linesArray.forEach((e: any) => {
                const row = e.replace(/[\s]+[,]+|[,]+[\s]+/g, ',').trim();
                lines.push(row);
            });

            // for removing empty record
            lines.splice(lines.length - 1, 1);
            const result = [];
            const headers = lines[0].split(",");

            for (let i = 1; i < lines.length; i++) {

                const obj = {};
                const currentline = lines[i].split(",");

                for (let j = 0; j < headers.length; j++) {
                    obj[headers[j]] = currentline[j];
                }
                result.push(obj);
            }
            //return result; //JavaScript object
            // return JSON.stringify(result); //JSON
            console.log("🚀 ~ file: BoxModel.tsx ~ line 52 ~ ConvertCSVToJSON ~ result", result)
        }

    };


console.log("🚀 ~ file: BoxModel.tsx ~ line 10 ~ BoxModel ~ refs", props.showPopup)
if (refs?.current?.style) {

    refs.current.style.display = props.showPopup;
}
const ModelPoup = () => {
    refs.current.style.display = "none";

    props.SetShow(false);

}
return (
    <div className='fp__model'>

        <div ref={refs} id="myModal" className="modal">


            <div className="modal-content">
                <div onClick={ModelPoup} className="close">&times;</div>


                <input onChange={FileUpload} type="file" id="actual-btn" hidden />

                <label htmlFor="actual-btn">Choose File</label>

                <span id="file-chosen">{filename ? filename : 'No file chosen'}</span>
            </div>

        </div>
    </div>
);
}
