/* add code here  */


window.addEventListener('load', function() {
    
    const form = document.getElementById('mainForm');
    
    // 选择所有需要高亮处理的元素
    const highlightableElements = form.querySelectorAll('.hilightable');
    
    // 1. 添加 focus 和 blur 事件监听器
    highlightableElements.forEach(element => {
        // 当获得焦点时，添加 'highlight' 类
        element.addEventListener('focus', function(){
            this.classList.add('highlight');
        });
        
        // 当失去焦点时，移除 'highlight' 类
        element.addEventListener('blur', function(){
            this.classList.remove('highlight');
        });
    });
    
    // 提前获取所有必填元素，供后续使用
    const requiredElements = form.querySelectorAll('.required');

    // 2. 添加 form submit 事件监听器
    form.addEventListener('submit', function(event) {
        let isValid = true;
        
        // 首先清除之前可能存在的 error 类
        requiredElements.forEach(el => el.classList.remove('error'));
        
        // 检查所有 required 字段
        requiredElements.forEach(el => {
            if (el.value.trim() === '') {
                isValid = false;
                el.classList.add('error');
            }
        });
        
        // 如果验证失败，阻止表单提交
        if (!isValid) {
            event.preventDefault();
        }
    });
    
    // 3：当必填字段输入内容时，实时移除报错红框
    requiredElements.forEach(el => {
        el.addEventListener('input', function() {
            // 如果去除首尾空格后不为空，说明用户输入了有效内容
            if (this.value.trim() !== '') {
                this.classList.remove('error');
            }
        });
    });
	
	// 使用 setTimeout 设置延时，是为了让你能在网页加载后，清楚地看到自动测试发生的过程

	    // 对应要求 2: Programmatically focus on field "Description"
	    setTimeout(function() {
	        console.log("Test-driver: 正在自动聚焦 Description 字段...");
	        const descriptionField = document.getElementById('description');
	        if (descriptionField) {
	            // 以编程方式触发 focus，你的 practice07 代码会自动给它加上黄色高亮背景
	            descriptionField.focus(); 
	        }
	    }, 1000); // 网页加载后 1 秒执行

	    // 对应要求 3: Programmatically error on empty fields ("Title", "Description", "Year")
	    setTimeout(function() {
	        console.log("Test-driver: 正在自动提交空表单...");
	        const form = document.getElementById('mainForm');
	        if (form) {
	            // 以编程方式派发 submit 事件，你的 practice07 代码会拦截提交并加上红色感叹号报错
	            form.dispatchEvent(new Event('submit', { cancelable: true, bubbles: true }));
	        }
	    }, 3500); // 网页加载后 3.5 秒执行
	
    
});

