
import { useRef } from '@wordpress/element/build-types';
import * as React from 'react';
import './css/FPBOXModel.scss'
export interface IBoxModelProps {
    showPopup: string;
    SetShow:(boolean:boolean) => boolean;
}

export function BoxModel(props: IBoxModelProps) {
    const refs = React.useRef<HTMLDivElement>() as  React.MutableRefObject<HTMLDivElement>;
    
    console.log("🚀 ~ file: BoxModel.tsx ~ line 10 ~ BoxModel ~ refs", props.showPopup)
    if(refs?.current?.style){

        refs.current.style.display = props.showPopup;
    }
    const ModelPoup = () =>{
        refs.current.style.display = "none";

        props.SetShow(false)
         
    }
    return (
        <div className='fp__model'>

            <div ref={refs} id="myModal" className="modal">


                <div className="modal-content">
                    <div onClick={ModelPoup} className="close">&times;</div>
                    <p>Some text in the Modal..</p>
                </div>

            </div>
        </div>
    );
}
