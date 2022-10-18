import ReactDOM from "react-dom";
import styled from "styled-components";
import * as React from 'react';
import {  useDispatch } from "react-redux";
import {  useState,useEffect } from "react";

type FPType ={
 isloading:boolean, name: string; holder: string; label: string; checked:string; options: JSX.Element[];
}
function FPDropList({ holder, label, options, checked, name,isloading }:FPType) {
  

  const [search, setSearch] = useState<string>();
  const [dropRem, setDropRem] = useState<JSX.Element>(
    <div className="loader-3">
    <div className="circle"></div>
    <div className="circle"></div>
    <div className="circle"></div>
    <div className="circle"></div>
    <div className="circle"></div>
  </div>
    );
  
  const droplist = React.useRef<HTMLInputElement>(null);
  const dropclick = React.useRef<HTMLInputElement>(null);
  const dispatch = useDispatch();
  // let stopTime:number;
  let node:Element;
    node = ReactDOM?.findDOMNode(droplist?.current) as HTMLInputElement;
    useEffect(()=>{
      setSearch(checked)

      if(droplist?.current){
        node = droplist?.current
      } 
    },[checked,node])
  


  const dropRemove = (removed:EventTarget) => {
    
    node?.classList?.toggle("show");
    // clearTimeout(stopTime);
  };
  const dropLeave = (selected:EventTarget) => {
    
    node?.classList?.remove("show");
  };
  const dropWait = (selected:EventTarget) => {
    
    node.classList.add("show");
  };
  const dropSelected = (selected:EventTarget) => {

    
  };
  const dropClicks = (drop) => {
    
    if(droplist?.current){
      node = droplist?.current
    }

  };
  const onChangeHandle = (drop,list) => {
    if(droplist?.current){
      node = droplist?.current
    }

  };
 
  return (
    <DropContainer onClick={(e) => dropRemove(e.target)} className='FP_drop_list_'>
      <SearchContainer onMouseLeave={(e:React.MouseEvent) => dropLeave(e.target)} className="FP__input__container">
        <label>{holder}</label>
       {/*  {isloading ? dropRem : ''} */}
          <input ref={dropclick} className="FP__input " name={name}   value={ checked} type="text"  onClick={(e:React.MouseEvent<HTMLInputElement>) => dropClicks(e.currentTarget.value)} onChange={(e:React.ChangeEvent<HTMLInputElement>) => onChangeHandle(e.target.value,e.target.name)} placeholder={ label} />
        <DropList ref={droplist}  onMouseEnter={(e:React.MouseEvent) => dropWait(e.target)}  onClick={(e:React.MouseEvent) => dropSelected(e.target)}   className={`${name} ${"hide"} ${"dropdownlist"} `}>
          {options}
        </DropList>
      </SearchContainer>
    </DropContainer>
  );
}

const DropContainer = styled.section`
  position: relative;
  width:100%;
`;
const SearchContainer = styled.section`
  position: relative;
`;

const DropList = styled.div`
  position: absolute;
`;
export default FPDropList;
